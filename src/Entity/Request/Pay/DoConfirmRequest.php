<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class DoConfirmRequest extends BaseRequest
{
    protected string $prepay_id;//预支付交易会话标识

    /**
     * @return string
     */
    public function getPrePayId(): string
    {
        return $this->prepay_id;
    }

    /**
     * @param $prepay_id
     * @return $this
     */
    public function setPrePayId($prepay_id): DoConfirmRequest
    {
        $this->prepay_id = $prepay_id;
        return $this;
    }
}