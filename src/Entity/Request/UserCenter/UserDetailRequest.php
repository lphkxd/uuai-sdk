<?php

namespace UUOA\OpenSdk\Entity\Request\UserCenter;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class UserDetailRequest extends BaseRequest
{
    protected int $user_id;//用户id

    /**
     * 用户id
     * @param $user_id
     * @return $this
     */
    public function setUserId($user_id): UserDetailRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }
}