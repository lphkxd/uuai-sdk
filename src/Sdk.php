<?php

namespace UUAI\Sdk;

use UUAI\Sdk\Api\ConnectorApi;
use UUAI\Sdk\Api\ContactApi;
use UUAI\Sdk\Api\JsSDKApi;
use UUAI\Sdk\Api\MessageApi;
use UUAI\Sdk\Api\PayApi;
use UUAI\Sdk\Api\UserCenterApi;
use UUAI\Sdk\Library\OpenApiClient;

/**
 * @property ContactApi    $contactApi
 * @property MessageApi    $messageApi
 * @property PayApi        $payApi
 * @property ConnectorApi  $connectorApi
 * @property UserCenterApi $userCenterApi
 * @property JsSDKApi         $jssdk
 */
class Sdk
{
    protected OpenApiClient $openApiClient;

    public function __construct($client_id, $secert = null, $accessToken = null)
    {
        $this->openApiClient = new OpenApiClient($client_id, $secert = null, $accessToken = null);
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