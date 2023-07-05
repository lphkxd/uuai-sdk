<?php

namespace UUAI\Sdk\Api;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use UUAI\Sdk\Library\OpenApiClient;

abstract class BaseApi
{
    protected OpenApiClient $openApiClient;

    public function __construct(OpenApiClient $openApiClient)
    {
        $this->openApiClient = $openApiClient;
    }

    /**
     * @param $method
     * @param $uri
     * @param $params
     * @return array|ResponseInterface
     * @throws \Exception
     */
    protected function request($method, $uri, $params, array $headers = []): array
    {
        try {
            return $this->openApiClient->request($method, $uri, $params->toArray(), $headers);
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage(), 500);
        }
    }
}