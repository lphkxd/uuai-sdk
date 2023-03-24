<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class RefundRequest extends BaseRequest
{
    protected string $out_trade_no;//交易订单号
    protected string $amount;//订单金额
    protected string $openid;//用户OpenId
    protected string $description;//描述
    protected string $sign_type;//签名类型 MD5
    protected string $sign;//签名

    /**
     * @return string
     */
    public function getOutTradeNo(): string
    {
        return $this->out_trade_no;
    }

    /**
     * 交易订单号
     * @param $out_trade_no
     * @return $this
     */
    public function setOutTradeNo($out_trade_no): RefundRequest
    {
        $this->out_trade_no = $out_trade_no;
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
    public function setAmount($amount): RefundRequest
    {
        $this->amount = $amount;
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
     * 用户OpenId
     * @param $openid
     * @return $this
     */
    public function setOpenid($openid): RefundRequest
    {
        $this->openid = $openid;
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
    public function setDescription($description): RefundRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        return $this->sign_type;
    }

    /**
     * 签名类型 MD5
     * @param $sign_type
     * @return $this
     */
    public function setSignType($sign_type): RefundRequest
    {
        $this->sign_type = $sign_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * 签名
     * @param $sign
     * @return $this
     */
    public function setSign($sign): RefundRequest
    {
        $this->sign = $sign;
        return $this;
    }
}
