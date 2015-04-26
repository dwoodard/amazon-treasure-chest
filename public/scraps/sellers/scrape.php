<?php
$expiration = 3600;

function get_data($url)
{
    $ch = curl_init();
    $timeout = 5;

    // TOR
    curl_setopt($ch, CURLOPT_PROXY, '0.0.0.0:9050');
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);

    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

//    preg_match_all('|Set-Cookie: (.*);|U', $content, $results);
//    $cookies = implode(';', $results[1]);
//    curl_setopt($ch, CURLOPT_COOKIE,  $cookies);
    $uid = uniqid();
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "./cookies/cookie".$uid.".txt");	// set cookie file
    curl_setopt($ch, CURLOPT_COOKIEJAR, './cookies/cookie'.$uid.'.txt');

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36');
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function post_data($url, $fields)
{
    //url-ify the data for the POST
    $fields_string = "";
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    $uid = uniqid();
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "./cookies/cookie".$uid.".txt");	// set cookie file
    curl_setopt($ch, CURLOPT_COOKIEJAR, './cookies/cookie'.$uid.'.txt');

    //execute post
    $data = curl_exec($ch);

    //close connection
    curl_close($ch);
    return $data;
}