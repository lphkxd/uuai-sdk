<?php

namespace UUAI\Sdk\Library;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\CacheInterface;

class OpenApiClient
{
    protected string $baseApi = 'https://api.uuptai.com';
    public ?string $clientId = null;
    public ?string $corpCode = null;
    protected ?string $secret = null;
    protected Client $client;
    protected ?CacheInterface $cache = null;
    //默认缓存驱动配置
    protected array $default_cache_config = [
        'driver' => 'file',
        'setting' => [
            'dir' => __DIR__ . '/tmp/'
        ]
    ];
    /**
     * @var mixed|null
     */
    private $isvAccessToken;
    private $sk = null;

    public function __construct($client_id = null, $secret = null, $corp_code = null, $isv_access_token = null)
    {
        $this->clientId = $client_id;
        $this->secret = $secret;
        $this->corpCode = $corp_code;
        $this->isvAccessToken = $isv_access_token;
        $this->corp_code = $corp_code;

    }

    public function setCache(?CacheInterface $cache): OpenApiClient
    {
        try {
            $this->cache = $cache;
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
            'base_uri' => $this->baseApi,
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
        if ($this->sk) {
            return 'Bearer '.$this->sk;
        }
        if (!$this->cache) {
            $this->setCache($this->cache);
        }
        $res = cache_remember($this->cache, 'ai-sdk:app_token:' . $this->corpCode, function () {
            if (!empty($this->clientId)) {
                $res = self::getClient()->get('/open/auth/token?client_id=' . $this->clientId . '&client_secret=' . $this->secret);
                if ($res->getStatusCode() != 200) {
                    throw new \Exception('请求失败', $res->getStatusCode());
                }
                $res = json_decode($res->getBody()->getContents(), true);
            } else {
                $res = self::getClient()->get('/open/isv/authorizer/token?corp_code=' . $this->corpCode, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->getIsvAccessToken()
                    ]
                ]);
                if ($res->getStatusCode() != 200) {
                    throw new \Exception('请求失败', $res->getStatusCode());
                }
                $res = json_decode($res->getBody()->getContents(), true);
                $this->setClientId($res['client_id'] ?? '');
            }
            // 这里应该做发放成功失败的检测
            return $res;
        }, 7000);
        $this->setClientId($res['client_id'] ?? '');
        if (empty($res['access_token'])) {
            throw new \Exception('获取access_token失败');
        }
        return $res['access_token'];
    }

    public function getAuthUrl($redirect_uri, $scope, $state)
    {
        $this->getAccessToken();
        $parsedUrl = parse_url($redirect_uri);
        $query = $parsedUrl['query'] ?? '';
        parse_str($query, $queryParams);
        $team_id = $queryParams['team_id'] ?? 0;
        $redirect_uri = urlencode($redirect_uri);
        if (empty($state)) {
            $state = $this->clientId;
        }
        return "https://passport.uuptai.com/login/oauth/authorize?client_id={$this->clientId}&response_type=code&redirect_uri={$redirect_uri}&scope={$scope}&state={$state}&team_id={$team_id}";
    }


    /**
     * 统一请求方法
     *
     * @param       $method
     * @param       $uri
     * @param array $options
     * @param array $headers 自定义headers
     *
     * @return array|ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $uri, array $options = [], array $headers = [])
    {
        $request_options = [];

        if (empty($headers)) {
            $request_options[RequestOptions::HEADERS]['Authorization'] = 'Bearer ' . $this->getAccessToken();
        } else {
            $request_options[RequestOptions::HEADERS] = $headers;
        }

        switch (strtolower($method)) {
            case 'patch':
            case 'put':
            case 'delete':
            case 'post':
                $request_options[RequestOptions::HEADERS]['Content-Type'] = 'application/json';
                $request_options['json'] = $options;
                break;
            case 'get':
                $request_options[RequestOptions::QUERY] = $options;
                break;
            default:
                break;
        }
        try {
            $response = self::getClient()->request($method, $uri, $request_options);
        } catch (TransferException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $errorMessage = json_decode($response->getBody()->getContents(), true);
            } else {
                $statusCode = 500;
                $errorMessage['error'] = '未知错误';
            }
            throw new \Exception($errorMessage['error'], $statusCode);
        }
        //返回页面
        // 针对 /open/apis/pay/confirm 确认订单支付页
        if ($response->getHeader('Content-Type') == 'text/html') {
            return $response;
        }
        return $this->handleResponse($response);
    }

    /**
     * 响应数据格式转换
     *
     * @param ResponseInterface $response
     *
     * @return array
     */
    public function handleResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId ?? $this->cache->get('corp:isv:client_id', '');
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
        $this->cache->set('corp:isv:client_id', $clientId, 8000);
    }

    /**
     * @return string
     */
    public function getCorpCode(): string
    {
        return $this->corpCode;
    }

    /**
     * @param string $corpCode
     */
    public function setCorpCode(string $corpCode): void
    {
        $this->corpCode = $corpCode;
    }

    /**
     * @return mixed|null
     */
    public function getIsvAccessToken(): mixed
    {
        return $this->isvAccessToken;
    }

    /**
     * @param mixed|null $isvAccessToken
     */
    public function setIsvAccessToken(mixed $isvAccessToken): void
    {
        $this->isvAccessToken = $isvAccessToken;
    }


    /**
     * @return CacheInterface|null
     */
    public function getCache(): ?CacheInterface
    {
        return $this->cache;
    }

    /**
     * @return string
     */
    public function getBaseApi(): string
    {
        return $this->baseApi;
    }

    /**
     * @param string $baseApi
     */
    public function setBaseApi(string $baseApi): void
    {
        $this->baseApi = $baseApi;
    }

    /**
     * @return mixed
     */
    public function getSk()
    {
        return $this->sk;
    }

    /**
     * @param mixed $sk
     */
    public function setSk($sk): void
    {
        $this->sk = $sk;
    }

}
