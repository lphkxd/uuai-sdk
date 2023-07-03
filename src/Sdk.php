<?php

namespace UUAI\Sdk;

use UUAI\Sdk\Api\JsSDKApi;
use UUAI\Sdk\Library\OpenApiClient;

/**
 * @property JsSDKApi $jssdk
 */
class Sdk
{
    protected OpenApiClient $openApiClient;

    public function __construct($client_id, $secert = null, $corp_code = null, $accessToken = null)
    {
        $this->openApiClient = new OpenApiClient($client_id, $secert = null, $corp_code, $accessToken = null);
    }

    public function setCache($config)
    {
        $this->openApiClient->setCache($config);
        return $this;
    }


    public function __get(string $name)
    {
        $class = 'UUAI\\Sdk\\Api\\' . $name;
        return new $class ($this->openApiClient);
    }
}