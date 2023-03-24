<?php

namespace UUOA\OpenSdk\Api;


use UUOA\OpenSdk\Entity\Request\UserCenter\UserDetailRequest;
use UUOA\OpenSdk\Entity\Response\UserCenter\UserDetailResponse;

/**
 * ISV开放平台/用户中心/用户管理
 */
class UserCenterApi extends BaseApi
{
    const API_USER_DETAIL= '/open/apis/user/v1/user/detail';//用户详情

    public function userDetail(UserDetailRequest $params): UserDetailResponse
    {
        $res = $this->request('get', self::API_USER_DETAIL, $params);
        return new UserDetailResponse($res);
    }
}