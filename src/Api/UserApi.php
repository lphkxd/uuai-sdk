<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserInfoRequest;

class UserApi extends OpenApi
{
    const API_USER_INFO = '/open/auth/user_info';
    const API_USER_BILLING = '/open/ai';

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

    public function billing($api)
    {
        $req = [];
        if (is_numeric($api)) {
            $req['dec_key_number'] = $api;
        } else {
            $req['api'] = $api;
        }
        return $this->action('Billing', $req);
    }
}