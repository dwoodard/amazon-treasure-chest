<?php


$curl_options = [
//        CURLOPT_HEADER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_PROXY => '0.0.0.0:9050',
    CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,
    CURLOPT_HTTPPROXYTUNNEL => 1,
    CURLINFO_HEADER_OUT => true,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_COOKIESESSION => TRUE,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
];

function get_data($url)
{
    $cookieFile = "./cookies/cookie" . uniqid() . ".txt";
    global $curl_options;

    $curl_options[CURLOPT_COOKIE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEFILE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEJAR] = $cookieFile;
    $ch = curl_init($url);

    curl_setopt_array($ch, $curl_options);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function post_data($url, $fields)
{
    $cookieFile = "./cookies/cookie" . uniqid() . ".txt";
    global $curl_options;

    //url-ify the data for the POST
    $fields_string = "";
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');



    //open connection
    $ch = curl_init($url);

    $curl_options[CURLOPT_COOKIE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEFILE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEJAR] = $cookieFile;

    $curl_options[CURLOPT_POST] = count($fields);
    $curl_options[CURLOPT_POSTFIELDS] = $fields_string;
//    $curl_options[CURLOPT_POSTREDIR] = 1;


    curl_setopt_array($ch, $curl_options);

    //execute post
    $data = curl_exec($ch);

    $rough_content = curl_exec($ch);
    $err = curl_errno($ch);
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);
    curl_close($ch);

    $header_content = substr($rough_content, 0, $header['header_size']);
    $body_content = trim(str_replace($header_content, '', $rough_content));
    $pattern = "#Set-Cookie:\\s+(?<cookie>[^=]+=[^;]+)#m";
    preg_match_all($pattern, $header_content, $matches);
    $cookiesOut = implode("; ", $matches['cookie']);

    $header['errno'] = $err;
    $header['errmsg'] = $errmsg;
    $header['headers'] = $header_content;
    $header['content'] = $body_content;
    $header['cookies'] = $cookiesOut;
    return [
        "header" => $header,
        "content" => $rough_content
    ];
}

function send_data($url, $fields)
{
    $cookieFile = "./cookies/cookie" . uniqid() . ".txt";
    global $curl_options;

    //url-ify the data for the POST
    $fields_string = "";
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init($url);

    $curl_options[CURLOPT_COOKIE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEFILE] = $cookieFile;
    $curl_options[CURLOPT_COOKIEJAR] = $cookieFile;
    $curl_options[CURLOPT_POST] = count($fields);
    $curl_options[CURLOPT_POSTFIELDS] = $fields_string;
//    $curl_options[CURLOPT_POSTREDIR] = 1;
    curl_setopt_array($ch, $curl_options);

    //execute post
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;

}

