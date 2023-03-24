<?php

namespace UUOA\OpenSdk\Api;

use UUOA\OpenSdk\Entity\Request\Connector\FlowExecuteRequest;
use UUOA\OpenSdk\Entity\Response\ItemsResponse;

/**
 * ISV开放平台/连接器/连接流
 */
class ConnectorApi extends BaseApi
{
    const API_FLOW_EXECUTE = '/open/apis/connector/flow/execute';//触发链接流

    public function flowExecute(FlowExecuteRequest $requestParams): ItemsResponse
    {
        $res = $this->request('get', self::API_FLOW_EXECUTE, $requestParams);
        return new ItemsResponse($res);
    }
}