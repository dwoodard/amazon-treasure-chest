<?php
include 'simple_html_dom.php';

$sellerInfo = [];

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function post_data($url, $fields){
	//url-ify the data for the POST
	$fields_string="";
	foreach($fields as $key=>$value) {
		$fields_string .= $key.'='.$value.'&';
	}
	rtrim($fields_string, '&');
	// die($fields_string);
	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$data = curl_exec($ch);

	//close connection
	curl_close($ch);
	return $data;
}





/*
*
* 1. Get List of products
*
*/



/*
*
* 2. For each product get "New Sellers Link"
*
* product['new_sellers_link']
*/

	//get_data
	// echo get_data("http://www.amazon.com/gp/offer-listing/B005GNLHZ8/ref=dp_olp_all_mbc?&shipPromoFilter=1");
	$str = file_get_contents ('test.txt');


	/*
	*
	* 3. Find each Seller Row
	*		Create an array of all sellers
	* 		$sellers = $html->find('.olpOffer', 0)
	*
	*/

	$html = str_get_html($str);

	$sellers = $html->find('.olpOffer');
	// echo count($sellers);



	/*
	*
	* 4. For Each Row as $seller
	*	find:
	*	sellerId = $sellers.find(".olpSellerName").a['href']
	*	all others
	*/

	foreach ($sellers as $key => $value) {
		$sellerInfo[$key] = [];
		$sellerInfo[$key]['price'] = $html->find('.olpOfferPrice',0)->plaintext;

		$html = str_get_html($value);

		// olpSellerName
		foreach($html->find('.olpSellerName') as $e){
			$olpSellerName = str_get_html($e)->find('a',0);
			// echo $olpSellerName->href;
			if (isset($olpSellerName->href)) {
				$sellerInfo[$key]['id'] = $olpSellerName->href;
				$sellerInfo[$key]['link_to_seller_products'] = $olpSellerName->href;
				$sellerInfo[$key]['name'] = $olpSellerName->plaintext;
			}else{
				$sellerInfo[$key]['id'] = 'amazon';
				$sellerInfo[$key]['name'] = 'amazon';
			}
			$sellerInfo[$key]['stock'] = "";

		}

		// $seller = $html->find('.olpSellerName a')->href;
		// echo $seller;
		// $sellerInfo[$key]['id'] = $html->find('.olpSellerName a')->href;
	}

	print_r($sellerInfo);

	/*
	*
	* 4. For Each Row as $seller
	*	find:
	*	sellerId = $sellers.find(".olpSellerName").a['href']
	*	all others
	*/





