<?php

namespace UUOA\OpenSdk\Entity\Request\Message;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class CardRevokeRequest extends BaseRequest
{
    protected string $number;// 用户集合

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * 用户集合
     * @param $number
     * @return $this
     */
    public function setNumber($number): CardRevokeRequest
    {
        $this->number = $number;
        return $this;
    }
}