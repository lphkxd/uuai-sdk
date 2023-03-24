<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class TradePayRequest extends BaseRequest
{
    protected string $out_trade_no;//交易订单号
    protected string $appid;//应用appid
    protected string $callback_url;//回调URL
    protected string $description;//商品描述
    protected string $notify_url;//通知地址
    protected int $amount;//订单金额 分
    protected string $openid;//用户OpenId
    protected string $attach;//授权类型
    protected int $trade_type;//交易类型 1员工卡U币支付
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
     * @param $out_trade_no
     * @return $this
     */
    public function setOutTradeNo($out_trade_no): TradePayRequest
    {
        $this->out_trade_no = $out_trade_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppid(): string
    {
        return $this->appid;
    }

    /**
     * @param $appid
     * @return $this
     */
    public function setAppid($appid): TradePayRequest
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callback_url;
    }

    /**
     * @param $callback_url
     * @return $this
     */
    public function setCallbackUrl($callback_url): TradePayRequest
    {
        $this->callback_url = $callback_url;
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
     * @param $description
     * @return $this
     */
    public function setDescription($description): TradePayRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyUrl(): string
    {
        return $this->notify_url;
    }

    /**
     * @param $notify_url
     * @return $this
     */
    public function setNotifyUrl($notify_url): TradePayRequest
    {
        $this->notify_url = $notify_url;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function setAmount($amount): TradePayRequest
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
     * @param $openid
     * @return $this
     */
    public function setOpenid($openid): TradePayRequest
    {
        $this->openid = $openid;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttach(): string
    {
        return $this->attach;
    }

    /**
     * @param $attach
     * @return $this
     */
    public function setAttach($attach): TradePayRequest
    {
        $this->attach = $attach;
        return $this;
    }

    /**
     * @return int
     */
    public function getTradeType(): int
    {
        return $this->trade_type;
    }

    /**
     * @param $trade_type
     * @return $this
     */
    public function setTradeType($trade_type): TradePayRequest
    {
        $this->trade_type = $trade_type;
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
     * @param $sign_type
     * @return $this
     */
    public function setSignType($sign_type): TradePayRequest
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
     * @param $sign
     * @return $this
     */
    public function setSign($sign): TradePayRequest
    {
        $this->sign = $sign;
        return $this;
    }
}