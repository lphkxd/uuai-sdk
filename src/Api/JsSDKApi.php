<?php

namespace UUAI\Sdk\Api;


use UUAI\Sdk\Entity\JsTokenRequest;
use UUAI\Sdk\Entity\JsTokenResponse;

/**
 * ISV开放平台/组织结构
 */
class JsSDKApi extends BaseApi
{
    const API_JS_TOKEN = '/open/apis/contact/employee'; // 人员列表 GET

    public function jsToken(JsTokenRequest $token): JsTokenResponse
    {
        $res = $this->request('get', self::API_JS_TOKEN);
        return new JsTokenResponse($res);
    }
}