<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserAccessTokenRequest;
use UUAI\Sdk\Entity\UserInfoRequest;

class AppApi extends BaseApi
{
    const API_APP_INFO = '/open/apis/app/plan';

    public function info()
    {
        return $this->request('get', self::API_APP_INFO);
    }
}