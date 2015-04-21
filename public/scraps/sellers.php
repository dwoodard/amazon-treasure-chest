<?php

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
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

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





$url = "http://www.amazon.com/gp/offer-listing/B005GNLHZ8/ref=dp_olp_all_mbc?ie=UTF8&condition=all";
echo get_data($url);


// $fields = array(
// 	'lname' => urlencode($last_name),
// 	'fname' => urlencode($first_name),
// 	'title' => urlencode($title),
// 	'company' => urlencode($institution),
// 	'age' => urlencode($age),
// 	'email' => urlencode($email),
// 	'phone' => urlencode($phone)
// );

$url = 'http://domain.com/get-post.php';
// echo post_data($url);