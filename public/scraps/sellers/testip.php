#!/usr/bin/php
<?php
set_time_limit(0);
include '/root/sellers/simple_html_dom.php';
include '/root/sellers/scrape.php';

for($i = 0; $i < 10; $i++){
    $ip = get_data('https://freegeoip.net/json/github.com');
    $geoip =  json_decode($ip);
    echo $geoip->ip .  " - " . $geoip->region_code  . PHP_EOL;

}