<?php
set_time_limit(0);
include 'simple_html_dom.php';
include 'scrape.php';
$sellerInfo = [];

/** 1. Get List of products */

$products = json_decode(file_get_contents('http://atc.dustinwoodard.net/product/json'));

foreach ($products as $product) {

//TEST
//foreach($products as $product){
//    echo ($product->new_sellers_link) . "\r\n";
//}
//die();
//End TEST

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

    if (!method_exists($html, 'find')) {
        continue;
    }
    $sellers = $html->find('.olpOffer');

//    echo count($sellers);
//    die();

    /** 4. For Each Row as $seller
     *    find:
     *    sellerId = $sellers.find(".olpSellerName").a['href']
     *    all others
     **/

    foreach ($sellers as $key => $value) {
        $sellerInfo[$key] = [];
        $sellerInfo[$key]["asin"] = $product->asin;
        $sellerInfo[$key]['price'] = $html->find('.olpOfferPrice', 0) ? $html->find('.olpOfferPrice', 0)->plaintext : "";
//        print_r($sellerInfo[$key]['price']);
//        die();

        $html = str_get_html($value);

        // olpSellerName
        foreach ($html->find('.olpSellerName') as $e) {
            $sellerIdLink = str_get_html($e)->find('a', 0);
            if (isset($sellerIdLink->href)) {
                preg_match("/(?:seller=|shops\/)([A-Z0-9]+)/", $sellerIdLink->href, $sellerId);
                $sellerInfo[$key]['sellerId'] = $sellerId[1];
                $sellerInfo[$key]['link_to_seller_products'] = $sellerIdLink->href;
                $sellerInfo[$key]['name'] = $sellerIdLink->plaintext;
            } else {
                $sellerInfo[$key]['sellerId'] = 'amazon';
                $sellerInfo[$key]['name'] = 'amazon';
            }
            $sellerInfo[$key]['stock'] = "";

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
            $sellerInfo[$key]['addToCartFields'] = $fields;

            //"Click" add to cart
            $cartAddedPage = post_data($action, $sellerInfo[$key]['addToCartFields']);

            // POST Confirm click on add to cart
            $html = str_get_html($cartAddedPage["content"]);
            $items_in_stock =  $html->getElementById('hlb-cart-itemcount')? $html->getElementById('hlb-cart-itemcount')->plaintext : null;
            $sellerInfo[$key]['items_in_stock'] = $items_in_stock;

            //"Get Value from Cart"
            $items_in_cart = json_decode(get_data("http://www.amazon.com/gp/navigation/ajax/dynamic-menu.html/" . $fields['session-id'] . "?cartItems=cart"));
            $sellerInfo[$key]['items_in_cart'] = $items_in_cart;



            //"Delete from Cart"

            //Wait 5 seconds
            sleep(1);
        }
    }
}
echo json_encode($sellerInfo);






