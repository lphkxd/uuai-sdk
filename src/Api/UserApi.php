<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserAccessTokenRequest;
use UUAI\Sdk\Entity\UserInfoRequest;

class UserApi extends OpenApi
{
    const API_USER_ACCESS_TOKEN = '/open/auth/user/access_token';
    const API_USER_INFO = '/open/auth/user/info';

    public function getAuthUrl($redirect_uri, $scope = 'read')
    {
        return $this->openApiClient->getAuthUrl($redirect_uri, $scope);
    }

    public function userAccessToken($code)
    {
        $request = new userAccessTokenRequest([
            'code' => $code
        ]);
        $res = $this->request('get', self::API_USER_ACCESS_TOKEN, $request);
        return $res;
    }

    public function userInfo($token)
    {
        $request = new UserInfoRequest();
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];
        $res = $this->request('get', self::API_USER_INFO, $request, $headers);
        return $res;
    }

    public function billing($api, $user_id)
    {
        $req = ['user_id' => $user_id];
        if (is_numeric($api)) {
            $req['dec_key_number'] = $api;
        } else {
            $req['api'] = $api;
        }
        return $this->action('Billing', $req);
    }
}