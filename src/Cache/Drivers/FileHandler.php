<?php

namespace UUOA\OpenSdk\Cache\Drivers;

class FileHandler implements HandlerInterface
{

    /**
     * 缓存目录
     * @var string
     */
    public $dir = '';

    /**
     * @var int
     */
    public $shard = 64;


    /**
     * @param array $setting
     */
    public function __construct(array $setting)
    {
        $this->dir   = $setting['dir'];
        $this->shard = $setting['shard'] ?? 64;
    }

    /**
     * 获取缓存
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $file = $this->getCacheFile($key);
        $data = @file_get_contents($file);
        if (empty($data)) {
            return $default;
        }
        $data = unserialize($data);
        if (!is_array($data) || count($data) !== 2) {
            return $default;
        }
        list($value, $expire) = $data;
        if ($expire > 0 && $expire < time()) {
            $this->delete($key);
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
        $file   = $this->getCacheFile($key);
        $expire = is_null($ttl) ? 0 : time() + $ttl;
        $data   = [
            $value,
            $expire,
        ];
        // 创建目录
        $dir = dirname($file);
        is_dir($dir) or mkdir($dir, 0777, true);
        // 写入
        $bytes = file_put_contents($file, serialize($data), LOCK_EX);
        return (bool)$bytes;
    }

    /**
     * 删除缓存
     * @param $key
     * @return bool
     */
    public function delete($key): bool
    {
        $file = $this->getCacheFile($key);
        return @unlink($file);
    }

    /**
     * 清除缓存
     * @return bool
     */
    public function clear(): bool
    {
        $dir = $this->dir;
        return static::deleteFolder($dir);
    }

    /**
     * 判断缓存是否存在
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        $value = $this->get($key);
        return !is_null($value);
    }

    /**
     * 获取缓存文件
     * @param $key
     * @return string
     */
    protected function getCacheFile($key): string
    {
        $dir    = $this->dir;
        $subDir = crc32($key) % $this->shard;
        $file   = md5($key);
        return $dir . DIRECTORY_SEPARATOR . $subDir . DIRECTORY_SEPARATOR . $file;
    }

    /**
     * 删除指定的文件夹及其内容
     * @param $dir
     * @return bool
     */
    protected static function deleteFolder($dir): bool
    {
        $dh = @opendir($dir);
        if (!$dh) {
            return false;
        }
        while (false !== ($file = readdir($dh))) {
            if (($file != '.') && ($file != '..')) {
                $full = $dir . '/' . $file;
                if (is_dir($full)) {
                    static::deleteFolder($full);
                } else {
                    @unlink($full);
                }
            }
        }
        closedir($dh);
        @rmdir($dir);
        return true;
    }
}