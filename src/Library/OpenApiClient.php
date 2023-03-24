<?php

namespace UUOA\OpenSdk\Library;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\CacheInterface as SimpleCacheInterface;
use UUOA\OpenSdk\Cache\Cache;

class OpenApiClient
{
    protected string $base_api;
    protected string $app_id;
    protected string $app_secret;
    protected Client $client;
    protected ?SimpleCacheInterface $cache = null;
    //默认缓存驱动配置
    protected array $default_cache_config = [
        'driver' => 'file',
        'setting' => [
            'dir' => __DIR__ . '/tmp/'
        ]
    ];

    public function __construct($app_id = null, $app_secret = null, $base_api = null)
    {
        $this->base_api = $base_api;
        $this->app_id = $app_id;
        $this->app_secret = $app_secret;
    }

    public function setCacheConfig(array $config): OpenApiClient
    {
        try {
            $this->cache = new Cache($config['driver'], $config['setting']);
            return $this;
        } catch (\Exception $e) {
            throw new \Exception('获取缓存实例失败', 500);
        }
    }

    /**
     * 获取http实例
     * @return Client
     */
    public function getClient(): Client
    {
        return new Client([
            'verify' => false,
            'base_uri' => $this->base_api,
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * 获取应用access_token
     * @return mixed
     * @throws GuzzleException
     */
    public function getAccessToken()
    {
        if(!$this->cache){
            $this->setCacheConfig($this->default_cache_config);
        }
        return cache_has_set($this->cache, 'uuoa-sdk:getAccessToken:' . $this->app_id, function () {
            $res = self::getClient()->get('/open/auth/token?appid=' . $this->app_id . '&app_secret=' . $this->app_secret);
            $content = $res->getBody()->getContents();
            if ($res->getStatusCode() != 200) {
                throw new \Exception('请求失败', $res->getStatusCode());
            }
            // 这里应该做发放成功失败的检测
            return json_decode($content, true)['access_token'] ?? '';
        }, 7000);

    }

    /**
     * 统一请求方法
     * @param $method
     * @param $uri
     * @param array $options
     * @return array|ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $uri, array $options = [])
    {
        $request_options = [];
        $request_options[RequestOptions::HEADERS]['Authorization'] = 'Bearer ' . $this->getAccessToken();
        switch ($method){
            case 'patch':
            case 'put':
            case 'delete':
            case 'post':
            $request_options[RequestOptions::HEADERS]['Content-Type'] = 'application/x-www-form-urlencoded';
            $request_options['form_params'] = $options;
                break;
            case 'get':
                $request_options[RequestOptions::QUERY] = $options;
                break;
            default:
                break;
        }
        try {
            $response = self::getClient()->request($method, $uri, $request_options);
        }catch (\Throwable $throwable){
            p($request_options, '请求失败options');
            p($throwable->getMessage(),'请求失败log');
            throw new \Exception('远程请求失败', 500);
        }
        //返回页面
        // 针对 /open/apis/pay/confirm 确认订单支付页
        if($response->getHeader('Content-Type') == 'text/html'){
            return $response;
        }
        return $this->handleResponse($response);
    }

    /**
     * 响应数据格式转换
     * @param ResponseInterface $response
     * @return array
     */
    public function handleResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

}