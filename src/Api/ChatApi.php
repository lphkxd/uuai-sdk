<?php

namespace UUAI\Sdk\Api;

use GuzzleHttp\Exception\GuzzleException;
use UUAI\Sdk\Entity\ChatRequest;
use UUPT\Contract\Exception\ApiException;

class ChatApi extends BaseApi
{
    const API_USER_INFO = '/open/auth/user_info';
    const API_COMPLETIONS = '/open/v1/chat/completions';


    public function completions(ChatRequest $chatRequest, $callback = null)
    {
        $callback = $callback ?? $chatRequest->getCallback();
        if ($chatRequest->getStream() && !$callback) {
            throw new \Exception(
                '您已启用流式输出，但未配置流式回调函数！'
            );
        }
        return $this->post($this->openApiClient->getBaseApi() . self::API_COMPLETIONS, $chatRequest->toArray(), $callback);
    }


    /**
     * @param               $uri
     * @param array         $params
     * @param \Closure|null $callback
     *
     * @return array
     * @throws GuzzleException
     */
    private function post($uri, array $params = [], ?\Closure $callback = null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                "Authorization: Bearer {$this->openApiClient->getAccessToken()}",
            ],
        ]);
        if (array_key_exists('stream', $params) && $params['stream']) {
            curl_setopt($curl, CURLOPT_WRITEFUNCTION, $callback);
        }
        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $this->curlInfo = $info;
        curl_close($curl);
        if ($info['http_code'] != 200) {
            throw new ApiException(json_decode($response, true)['error'] ?? '请求开放平台异常，错误码：' . $info['http_code'], $info['http_code']);
        }
        return json_decode($response, true);
    }
}