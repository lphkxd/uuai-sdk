<?php

namespace UUOA\OpenSdk\Entity\Response\Pay;


class WalletResponse
{

    /**
     * 全部数据
     * @var array
     */
    public array $items;

    /**
     * 余额
     * @var string
     */
    public string $uu_money;

    public function __construct($responseData)
    {
        $this->items = $responseData ?? [];
        $this->uu_money = $responseData['uu_money'] ?? '0';
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