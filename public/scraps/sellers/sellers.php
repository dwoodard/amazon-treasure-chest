<?php
set_time_limit(0);
include 'simple_html_dom.php';
include 'scrape.php';
$sellerInfo = [];

/** 1. Get List of products */

$products = json_decode(file_get_contents('http://atc.dustinwoodard.net/product/json'));

//TEST
//foreach($products as $key => $product){
//    echo ($key . " " . $product->new_sellers_link) . "\r\n";
//}
//die();
//End TEST
foreach ($products as $asin => $product) {

    $sellerInfo[$asin] = [];
    /** 2. For each product get "New Sellers Link" */
    /** get_data **/

    $data = trim(get_data($product->new_sellers_link));

// die($data); //pipe out what.html
// $str = file_get_contents ('what.html');

    /**
     * 3. Find each Seller Row
     *    Create an array of all sellers
     *    $sellers = $html->find('.olpOffer', 0)
     */

    $html = str_get_html($data);
//    $html = str_get_html($str);

//    if (!method_exists($html, 'find')) {
//        continue;
//    }
    $sellers = $html->find('.olpOffer');

//    echo count($sellers);
//    die();

    /** 4. For Each Row as $seller
     *    find:
     *    sellerId = $sellers.find(".olpSellerName").a['href']
     *    all others
     **/

    foreach ($sellers as $key => $value) {
        $sellerInfo[$asin][$key] = [];
        $sellerInfo[$asin][$key]["asin"] = $product->asin;
        $sellerInfo[$asin][$key]['price'] = $html->find('.olpOfferPrice', 0) ? trim($html->find('.olpOfferPrice', 0)->plaintext) : "";
//        print_r($sellerInfo[$asin][$key]['price']);
//        die();
        $sellerInfo[$asin][$key]['link_to_seller_products'] = "";
        $html = str_get_html($value);

        // olpSellerName
        foreach ($html->find('.olpSellerName') as $e) {
            $sellerIdLink = str_get_html($e)->find('a', 0);
            if (isset($sellerIdLink->href)) {
                preg_match("/(?:seller=|shops\/)([A-Z0-9]+)/", $sellerIdLink->href, $sellerId);
                $sellerInfo[$asin][$key]['sellerId'] = $sellerId[1];
                $sellerInfo[$asin][$key]['link_to_seller_products'] = $sellerIdLink->href;
                $sellerInfo[$asin][$key]['name'] = $sellerIdLink->plaintext;
            } else {
                $sellerInfo[$asin][$key]['sellerId'] = 'amazon';
                $sellerInfo[$asin][$key]['name'] = 'amazon';
            }
            $sellerInfo[$asin][$key]['stock'] = "";

//            print_r($sellerInfo);
//            die();
        }

        // Get AddToCart data to cart Form
        foreach ($html->find('form') as $form) {
            $action = 'www.amazon.com' . $form->action;
            $method = $form->method;
            $inputs = $form->find('input');

            $fields = [];
            foreach ($inputs as $input) {
                $fields[$input->name] = $input->value;
            }
            $fields['itemCount:1'] = 999;
            $fields['quantity.1'] = 999;
            $sellerInfo[$asin][$key]['addToCartFields'] = $fields;

            //"Click" add to cart
            $cartAddedPage = post_data($action, $sellerInfo[$asin][$key]['addToCartFields']);

            // POST Confirm click on add to cart
            $html = str_get_html($cartAddedPage["content"]);
//            echo $html;
//            die();

            if (count($html->find('p.a-spacing-micro'))) {
                preg_match("/the (\d+) available from the seller/", $html->find('p.a-spacing-micro',0)->plaintext, $inventory);
                $sellerInfo[$asin][$key]['stock'] = $inventory ? $inventory[1] : "didnt get it";
            } elseif ($html->getElementById('hlb-cart-itemcount')) {
                //"Get Value from Cart"
                $sellerInfo[$asin][$key]['stock'] = $html->getElementById('hlb-cart-itemcount') ? $html->getElementById('hlb-cart-itemcount')->plaintext : null;
            }

            //"Delete from Cart"
//            $fields['itemCount:1'] = 0;
//            $fields['quantity.1'] = 0;
//            $sellerInfo[$asin][$key]['addToCartFields'] = $fields;
//            post_data($action, $sellerInfo[$asin][$key]['addToCartFields']);

//            $items_in_cart = json_decode(get_data("http://www.amazon.com/gp/navigation/ajax/dynamic-menu.html/" . $fields['session-id'] . "?cartItems=cart"));
//            $sellerInfo[$asin][$key]['items_in_cart'] = $items_in_cart;

            unset($sellerInfo[$asin][$key]['addToCartFields']);

            post_data("http://atc.dustinwoodard.net/tracker", $sellerInfo[$asin][$key]);

            //Wait 5 seconds
            sleep(5);

        }
    }
}
//echo json_encode($sellerInfo);







