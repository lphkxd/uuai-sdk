<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\ActionRequest;
use UUAI\Sdk\Entity\UserAccessTokenRequest;
use UUAI\Sdk\Entity\UserInfoRequest;

class UserApi extends OpenApi
{
    const API_USER_ACCESS_TOKEN = '/open/auth/user/access_token';
    const API_USER_INFO = '/open/auth/user/info';
    const API_OPEN_AI_BILLING = '/open/ai/user/billing';
    const API_OPEN_AI_USER_INFO = '/open/ai/user/info';

    public function getAuthUrl($redirect_uri, $scope = 'read', $state = '')
    {
        return $this->openApiClient->getAuthUrl($redirect_uri, $scope, $state);
    }

    public function userAccessToken($code)
    {
        $request = new userAccessTokenRequest([
            'code' => $code
        ]);
        $res = $this->request('get', self::API_USER_ACCESS_TOKEN, $request->toArray());
        return $res;
    }

    public function userInfo($token)
    {
        $request = new UserInfoRequest();
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];
        $res = $this->request('get', self::API_USER_INFO, $request->toArray(), $headers);
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

    public function charge(ActionRequest $request)
    {
        return $this->request('post', self::API_OPEN_AI_BILLING, $request->toArray());
    }

    public function openUserInfo($user_id, $team_corp_id = 0)
    {
        return $this->request('post', self::API_OPEN_AI_USER_INFO, ['user_id' => $user_id, 'team_corp_id' => $team_corp_id]);
    }
}