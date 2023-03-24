<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class TransferRequest extends BaseRequest
{
    protected string $openid;//用户OpenId
    protected string $from_openid;//用户OpenId
    protected string $description;//描述
    protected string $amount;//订单金额

    /**
     * @return string
     */
    public function getOpenid(): string
    {
        return $this->openid;
    }

    /**
     * 用户OpenId
     * @param $openid
     * @return $this
     */
    public function setOpenid($openid): TransferRequest
    {
        $this->openid = $openid;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromOpenid(): string
    {
        return $this->from_openid;
    }

    /**
     * 用户OpenId
     * @param $from_openid
     * @return $this
     */
    public function setFromOpenid($from_openid): TransferRequest
    {
        $this->from_openid = $from_openid;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 描述
     * @param $description
     * @return $this
     */
    public function setDescription($description): TransferRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * 订单金额
     * @param $amount
     * @return $this
     */
    public function setAmount($amount): TransferRequest
    {
        $this->amount = $amount;
        return $this;
    }
}