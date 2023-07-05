<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\UserInfoRequest;

class OpenApi extends BaseApi
{
    const API_USER_INFO = '/open/auth/user_info';
    const API_OPEN_AI = '/open/ai';


    public function action($model, $data)
    {
        $data['engine'] = $model;
        $request = new UserInfoRequest($data);
        $res = $this->request('post', self::API_USER_INFO, $request);
        return $res;
    }

}