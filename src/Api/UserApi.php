<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserInfoRequest;

class UserApi extends BaseApi
{
    const API_USER_INFO = '/open/auth/user_info';

    public function getAuthUrl($redirect_uri, $scope = 'read')
    {
        return $this->openApiClient->getAuthUrl($redirect_uri, $scope);
    }

    public function userInfo($code)
    {
        $request = new UserInfoRequest([
            'code' => $code
        ]);
        $res = $this->request('get', self::API_USER_INFO, $request);
        return $res;
    }

}