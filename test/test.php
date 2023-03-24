<?php

use UUOA\OpenSdk\Entity\Request\Contact\EmployersRequest;
use UUOA\OpenSdk\Entity\Request\Pay\WalletRequest;
use UUOA\OpenSdk\Sdk;

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
    'base_api' => 'https://open.api.sn.cn',
]);

$cache_config_file = [
    'dir' => __DIR__ . '/tmp/'
];

$cache_config_redis = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'db' => 0,
    'auth' => null,
];

$cache = [
    'driver' => 'file',
    'setting' => $cache_config_file
];
// 设置缓存驱动
$sdk->setCache($cache);
//
$employersRequest = new EmployersRequest();

$employersRequest->setLimit(2)
    ->setPage(1)
    ->setCorpCode('dingfee9459144c03665');

$employers = $sdk->contactApi->employers($employersRequest);
p($employers->items);//全部数据

$req = new WalletRequest();
$req->setOpenid('8EbdD3f46c8FEC94cF7Fdfd8e42C1Adb');
$send = $sdk->payApi->wallet($req);
p($send->uu_money);//单个数据
exit;