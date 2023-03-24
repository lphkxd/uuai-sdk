<?php

namespace UUOA\OpenSdk;

use UUOA\OpenSdk\Api\ConnectorApi;
use UUOA\OpenSdk\Api\ContactApi;
use UUOA\OpenSdk\Api\MessageApi;
use UUOA\OpenSdk\Api\PayApi;
use UUOA\OpenSdk\Api\UserCenterApi;
use UUOA\OpenSdk\Library\OpenApiClient;

/**
 * @property ContactApi $contactApi
 * @property MessageApi $messageApi
 * @property PayApi $payApi
 * @property ConnectorApi $connectorApi
 * @property UserCenterApi $userCenterApi
 */
class Sdk
{
    protected OpenApiClient $openApiClient;
    /**
     * @var bool|string
     */
    protected $accessToken;


    public function __construct($config)
    {
        $this->openApiClient = new OpenApiClient($config['app_id'], $config['app_secret'], $config['base_api']);
    }

    public function setCache($config)
    {
        $this->openApiClient->setCacheConfig($config);
        return $this;
    }


    public function __get(string $name)
    {
        $class = 'UUOA\OpenSdk\Api\\'.$name;
        return new $class ($this->openApiClient);
    }
}