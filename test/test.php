<?php

use UUAI\Sdk\Entity\JsTokenRequest;
use UUAI\Sdk\Entity\UserRequest;
use UUAI\Sdk\ISVSdk;

require_once "../vendor/autoload.php";

//需要数据1
$corp_code = 'xxxxxx';
$isv_id = 'xxxxxx';
$isv_secret = 'xxxxxxx';
// isv应用 换取对应组织下的应用token
$isv = new ISVSdk($corp_code, $isv_id, $isv_secret);
$sdk = $isv->getSdk();
$request = new JsTokenRequest();
$ticket = $sdk->JsSDKApi->jsToken($request)['ticket'];
//需要数据2
$url = 'https://xxxxxx.com';
$jsApiList = [
    'aa', 'bb', 'cc', 'dd'
];
$userRequest = new UserRequest([
    'id' => 0,
    'name' => '',
    'nickname' => '',
    'avatar' => '',
]);
//组装应用jssdk配置
$jsConfig = $sdk->JsSDKApi->buildConfig($jsApiList, $userRequest, $url, $ticket);
dump($jsConfig);

exit;