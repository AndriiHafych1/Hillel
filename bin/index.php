<?php
use andrii\PhpPro\url\{DataHandler, UrlDecoder, UrlEncoder};

require_once __DIR__ . '/../vendor/autoload.php';

$storage = __DIR__ . '/../storage/URL.txt';

$data = new DataHandler("$storage");



echo "If you want to create short URL pres 1. If you want convert short URL to regular press 2".PHP_EOL;
$choice = fgetc(STDIN);
try {
    switch ($choice){
        case 1:
            $create = new UrlEncoder($data, new \andrii\PhpPro\url\UrlValidator(), new \andrii\PhpPro\url\ConvertUrl());
            echo 'Please write your URL'.PHP_EOL;
            $url = readline();
            $create->encode($url);
            echo "Done";
            break;
        case 2:
            echo 'Please write your short URL'.PHP_EOL;
            $surl = readline();
            $decode = new UrlDecoder($data);
            echo 'Your full URL is '. $decode->decode($surl);
            break;
        default:
            echo "Please restart application";
    }
}catch (Exception $e){
}




//

//print_r($z);


echo PHP_EOL;