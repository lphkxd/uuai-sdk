<?php

use UUAI\Sdk\Entity\JsTokenRequest;
use UUAI\Sdk\Sdk;

require_once "../vendor/autoload.php";

$sdk = new Sdk([
    //公告
//    'app_id' => 'app16306f566c8952',
//    'app_secret' => '0b3dc91d0f12d679ae9c44bb29b6ac10',

    //ssc
//    'app_id' => 'app163063fa5229ea',
//    'app_secret' => '4582cb2fc00aaa94dbc03b062fd7002b',
   // 门户
    'app_id' => 'app160acd58c593a8',
    'app_secret' => '8b4363504b03eda3ba22eec36d1dd83d',
]);

//
$employersRequest = new JsTokenRequest();

$jssdk = $sdk->jssdk->jsToken($employersRequest);



p($jssdk);//全部数据

exit;