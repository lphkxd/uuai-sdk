<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserAccessTokenRequest;
use UUAI\Sdk\Entity\UserInfoRequest;

class AppApi extends OpenApi
{
    const API_APP_INFO = '/open/apis/app/info';

    public function info()
    {
        $request = new UserInfoRequest();
        $res = $this->request('get', self::API_APP_INFO, $request);
        return $res;
    }
}