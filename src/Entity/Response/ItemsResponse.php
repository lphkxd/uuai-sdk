<?php

namespace UUOA\OpenSdk\Entity\Response;


class ItemsResponse
{
    /**
     * 全部数据
     * @var array
     */
    public array $items;

    public function __construct($responseData)
    {
        $this->items = $responseData ?? [];
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