<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class WalletRequest extends BaseRequest
{
    protected string $openid;// openid

    public function getOpenid(): string
    {
        return $this->openid;
    }

    /**
     * openid
     * @param $openid
     * @return $this
     */
    public function setOpenid($openid): WalletRequest
    {
        $this->openid = $openid;
        return $this;
    }
}