<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class EmployeeDetailRequest extends BaseRequest
{
    protected string $username;//用户名
    protected string $openid;//用户openid
    protected string $mobile;//手机号

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * 用户名
     * @param $username
     * @return $this
     */
    public function setUsername($username): EmployeeDetailRequest
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenid(): string
    {
        return $this->openid;
    }

    /**
     * openid
     * @param $openid
     * @return $this
     */
    public function setOpenid($openid): EmployeeDetailRequest
    {
        $this->openid = $openid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * 手机号
     * @param $mobile
     * @return $this
     */
    public function setMobile($mobile): EmployeeDetailRequest
    {
        $this->mobile = $mobile;
        return $this;
    }
}