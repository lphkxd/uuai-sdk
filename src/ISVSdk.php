<?php

namespace UUAI\Sdk;

use Psr\SimpleCache\CacheInterface;
use UUAI\Sdk\Library\ISVApiClient;

class ISVSdk
{

    protected ISVApiClient $ISVApiClient;
    private ?CacheInterface $cache;

    public function __construct($corp_code,$isv_id, $secret)
    {
        $this->ISVApiClient = new ISVApiClient($corp_code,$isv_id, $secret);
    }


    public function setCache(?CacheInterface $config): ISVSdk
    {
        try {
            $this->cache = $config;
            return $this;
        } catch (\Exception $e) {
            throw new \Exception('获取缓存实例失败', 500);
        }
    }


    public function getSdk()
    {
        return $this->ISVApiClient->getSdk()->setCache($this->cache);
    }

}