<?php

namespace UUOA\OpenSdk\Entity\Response\Pay;


class TradePayResponse
{
    /**
     * 全部数据
     * @var array
     */
    public array $items;
    /**
     * 预支付订单号
     * @var string
     */
    public string $prepay_id;

    public function __construct($responseData)
    {
        $this->items = $responseData ?? [];
        $this->prepay_id = $responseData['prepay_id'] ?? '';
    }

    public function __get($name)
    {
        if (!in_array($name, get_object_vars($this))) {
            return null;
        } else {
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        if (!in_array($name, get_object_vars($this))) {
            return;
        } else {
            $this->$name = $value;
        }
    }
}