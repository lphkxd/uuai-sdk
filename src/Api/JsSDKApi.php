<?php

namespace UUAI\Sdk\Api;


use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use UUAI\Sdk\Entity\JsTokenRequest;
use UUAI\Sdk\Entity\JsTokenResponse;
use UUAI\Sdk\Entity\UserRequest;
use UUAI\Sdk\Library\JSSDKTicket;

/**
 * ISV开放平台/组织结构
 */
class JsSDKApi extends BaseApi
{
    const API_JS_TOKEN = '/open/auth/js_ticket'; // 人员列表 GET

    public function jsToken(JsTokenRequest $request)
    {
        $res = $this->request('get', self::API_JS_TOKEN, $request);
        return $res;
        return new JsTokenResponse($res);
    }

    public function buildConfig($jsApiList, UserRequest $userRequest, $url, $ticket)
    {
        $nonce = Str::random(12);
        $timestamp = get_millisecond();
        return[
            'appid' => $this->openApiClient->client_id,
            'nonceStr' => $nonce,
            'user' => $userRequest->toArray(),
            'jsApiList' => $jsApiList,
            'timeStamp' => get_millisecond(),
            'url' => $url,
            'signature' => JSSDKTicket::getTicketSignature($ticket, $nonce, $timestamp, $url, $userRequest->toArray(), $jsApiList),
        ];
    }
    
}