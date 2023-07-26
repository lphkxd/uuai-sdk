<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\BuildConfigRequest;
use UUAI\Sdk\Entity\JsTokenRequest;
use UUAI\Sdk\Library\JSSDKTicket;

/**
 * ISV开放平台/组织结构
 */
class JsSDKApi extends BaseApi
{
    const API_JS_TOKEN = '/open/auth/js_ticket'; // 人员列表 GET

    public function jsToken(JsTokenRequest $request)
    {
        return cache_remember($this->openApiClient->getCache(), 'ai-sdk:js_token:' . $this->openApiClient->clientId, function () use ($request) {
            return $this->request('get', self::API_JS_TOKEN, $request->toArray());
        });
    }

    public function buildConfig(BuildConfigRequest $buildConfigRequest)
    {
        $request = new JsTokenRequest();
        $ticket = $this->jsToken($request)['ticket'];
        $timestamp = get_millisecond();
        $nonce = bin2hex(random_bytes(6));
        $params = [
            'client_id' => $this->openApiClient->getClientId(),
            'nonceStr' => $nonce,
            'user' => $buildConfigRequest->getUser(),
            'jsApiList' => $buildConfigRequest->getJsApiList(),
            'timeStamp' => get_millisecond(),
            'url' => $buildConfigRequest->getUrl(),
        ];
        $params['signature'] = JSSDKTicket::getTicketSignature($ticket, $nonce, $timestamp, $params['url'], $params['user'], $params['jsApiList']);
        return $params;
    }

}