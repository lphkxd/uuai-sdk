<?php

namespace UUOA\OpenSdk\Entity\Request\Pay;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class AdminTransferRequest extends BaseRequest
{
    protected string $employee_id;//成员ID
    protected string $amount;//订单金额
    protected string $description;//描述
    protected string $scene;//场景



    /**
     * @return string
     */
    public function getEmployeeId(): string
    {
        return $this->employee_id;
    }

    /**
     * @param $employee_id
     * @return $this
     */
    public function setEmployeeId($employee_id): AdminTransferRequest
    {
        $this->employee_id = $employee_id;
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
     * @param $amount
     * @return $this
     */
    public function setAmount($amount): AdminTransferRequest
    {
        $this->amount = $amount;
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
    public function setDescription($description): AdminTransferRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getScene(): string
    {
        return $this->scene;
    }

    /**
     * @param $scene
     * @return $this
     */
    public function setScene($scene): AdminTransferRequest
    {
        $this->scene = $scene;
        return $this;
    }
}