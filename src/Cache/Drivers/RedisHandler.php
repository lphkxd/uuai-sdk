<?php

namespace UUOA\OpenSdk\Cache\Drivers;

use Redis;

class RedisHandler implements HandlerInterface
{
    /**
     * @var Redis
     */
    public Redis $redis;

    /**
     * @var string
     */
    public string $keyPrefix = 'OA_SDK_CACHE:';

    /**
     * @param array $setting
     * @throws \Exception
     */
    public function __construct(array $setting = [])
    {
        $config = [
            'host' => '127.0.0.1',
            'port' => 6379,
            'db' => 0,
            'auth' => null,
        ];

        foreach (array_keys($config) as $key) {
            if (isset($setting[$key])) {
                $config[$key] = $setting[$key];
            }
        }
        try {
            return $this->connect($config);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * 链接redis
     * @param array $config
     * @return Redis
     * @throws \Exception
     */
    protected function connect(array $config): Redis
    {
        if(!extension_loaded('redis')){
            throw new \Exception('请先安装 PHPRedis 扩展');
        }
        try {
            $this->redis = new Redis();
            $this->redis->connect($config['host'], $config['port']);
            $this->redis->select($config['db']);
            $this->redis->auth($config['auth']);
            return $this->redis;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    /**
     * 获取缓存
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $cacheKey = $this->keyPrefix . $key;
        $value    = $this->redis->get($cacheKey);
        if (empty($value)) {
            return $default;
        }
        $value = unserialize($value);
        if ($value === false) {
            return $default;
        }
        return $value;
    }

    /**
     * 设置缓存
     * @param $key
     * @param $value
     * @param null $ttl
     * @return bool
     */
    public function set($key, $value, $ttl = null): bool
    {
        $cacheKey = $this->keyPrefix . $key;
        if (is_null($ttl)) {
            $success = $this->redis->set($cacheKey, serialize($value));
        } else {
            $success = $this->redis->setex($cacheKey, $ttl, serialize($value));
        }
        return (bool)$success;
    }

    /**
     * 删除缓存
     * @param $key
     * @return bool
     */
    public function delete($key): bool
    {
        $cacheKey = $this->keyPrefix . $key;
        $success  = $this->redis->del($cacheKey);
        return (bool)$success;
    }

    /**
     * 清除缓存
     * @return bool
     */
    public function clear(): bool
    {
        $iterator = null;
        while (true) {
            $keys = $this->redis->scan($iterator, "{$this->keyPrefix}*");
            if ($keys === false) {
                return true;
            }
            foreach ($keys as $key) {
                $this->redis->del($key);
            }
        }
    }

    /**
     * 判断缓存是否存在
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        $cacheKey = $this->keyPrefix . $key;
        $success  = $this->redis->exists($cacheKey);
        return (bool)$success;
    }
}