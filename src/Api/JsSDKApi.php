<?php

namespace UUAI\Sdk\Api;


use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use UUAI\Sdk\Entity\JsTokenResponse;

/**
 * ISV开放平台/组织结构
 */
class JsSDKApi extends BaseApi
{
    const API_JS_TOKEN = '/open/auth/js_ticket'; // 人员列表 GET

    public function jsToken(): JsTokenResponse
    {
        $res = $this->request('get', self::API_JS_TOKEN);
        return new JsTokenResponse($res);
    }

    private function getUrl()
    {
        $url = request()->getHeaderLine('Referer');
        if (empty($url)) {
            $url = request()->getHeaderLine('Origin');
        }
        if (empty($url)) {
            throw new \Exception(400, '获取url失败');
        }
        $uri = new Uri($url);
        $url = Uri::composeComponents($uri->getScheme(), $uri->getAuthority(), $uri->getPath(), '', '');
        if (empty($url)) {
            throw new \Exception(400, '无效的URL');
        }
        return $url;
    }

    public function buildConfig($jsApiList)
    {
        return[
            'appid' => $this->openApiClient->client_id,
            'nonceStr' => Str::random(12),
            'user' => $user,
            'jsApiList' => $jsApiList,
            'timeStamp' => get_millisecond(),
            'url' => $url,
            'signature' => JSSDKTicket::getTicketSignature($ticket, $nonce, $timestamp, $url, $user, $jsApiList),
        ];
    }
    
}