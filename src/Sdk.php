<?php

namespace UUAI\Sdk;

use UUAI\Sdk\Api\AppApi;
use UUAI\Sdk\Api\ChatApi;
use UUAI\Sdk\Api\JsSDKApi;
use UUAI\Sdk\Api\UserApi;
use UUAI\Sdk\Library\OpenApiClient;

/**
 * @property JsSDKApi $jsSDK
 * @property UserApi $user
 * @property AppApi $app
 * @property ChatApi $chat
 */
class Sdk
{
    protected OpenApiClient $openApiClient;

    /**
     * @param $client_id
     * @param $secert
     * @param $corp_code
     * @param $accessToken
     */
    public function __construct($client_id, $secert = null, $corp_code = null, $accessToken = null)
    {
        $this->openApiClient = new OpenApiClient($client_id, $secert, $corp_code, $accessToken);
    }

    public function setCache($config)
    {
        $this->openApiClient->setCache($config);
        return $this;
    }


    public function __get(string $name)
    {
        $class = 'UUAI\\Sdk\\Api\\' . ucfirst($name).'Api';
        return new $class ($this->openApiClient);
    }
}