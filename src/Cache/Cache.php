<?php

namespace UUOA\OpenSdk\Cache;

use Psr\SimpleCache\CacheInterface;

class Cache implements CacheInterface
{
    /**
     * @var mixed
     */
    public $handler;

    /**
     * @param $driver
     * @param array $settings
     * @throws \Exception
     */
    public function __construct($driver, array $settings = [])
    {
        $class = ucfirst(strtolower($driver));
        if (file_exists(__DIR__ . '/Drivers/' . $class . 'Handler.php')) {
            $class = '\UUOA\OpenSdk\Cache\Drivers\\' . $class . 'Handler';
            $this->handler = new $class($settings);
        }
        if (!$this->handler) {
            throw new \Exception('缓存驱动不存在');
        }

    }

    /**
     * 获取缓存
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null): mixed
    {
        return $this->handler->get($key, $default);
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
        return $this->handler->set($key, $value, $ttl);
    }

    /**
     * 删除缓存
     * @param $key
     * @return bool
     */
    public function delete($key): bool
    {
        return $this->handler->delete($key);
    }

    /**
     * 清除缓存
     * @return bool
     */
    public function clear(): bool
    {
        return $this->handler->clear();
    }

    /**
     * 判断缓存是否存在
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return $this->handler->has($key);
    }

    /**
     * 批量获取
     * @param $keys
     * @param null $default
     * @return array
     */
    public function getMultiple($keys, $default = null): iterable
    {
        $results = [];
        foreach ($keys as $key) {
            $results[$key] = $this->get($key, $default);
        }
        return $results;
    }

    /**
     * 批量设置
     * @param $values
     * @param null $ttl
     * @return bool
     */
    public function setMultiple($values, $ttl = null): bool
    {
        $results = [];
        foreach ($values as $key => $value) {
            $results[] = $this->set($key, $value, $ttl);
        }
        foreach ($results as $result) {
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * 批量删除
     * @param $keys
     * @return bool
     */
    public function deleteMultiple($keys): bool
    {
        $results = [];
        foreach ($keys as $key) {
            $results[] = $this->delete($key);
        }
        foreach ($results as $result) {
            if (!$result) {
                return false;
            }
        }
        return true;
    }

}