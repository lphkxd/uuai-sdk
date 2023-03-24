<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;


use UUOA\OpenSdk\Entity\Request\BaseRequest;


class EmployeeLeaveRequest extends BaseRequest
{
    protected int $type;//类型 1保留 2删除
    protected int $receiver_type;// 接受类型 1直属上级 2部门负责人 3自己 4指定员工
    protected int $receiver_id;//接收人id
    protected array $apps;//类型 apps 原样返回
    protected array $employee_ids;//员工ID

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * 类型 1保留 2删除
     * @param $type
     * @return $this
     */
    public function setType($type): EmployeeLeaveRequest
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceiverType(): int
    {
        return $this->receiver_type;
    }

    /**
     * 接受类型 1直属上级 2部门负责人 3自己 4指定员工
     * @param $receiver_type
     * @return $this
     */
    public function setReceiverType($receiver_type): EmployeeLeaveRequest
    {
        $this->receiver_type = $receiver_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    /**
     * 接收人id
     * @param $receiver_id
     * @return $this
     */
    public function setReceiverId($receiver_id): EmployeeLeaveRequest
    {
        $this->receiver_id = $receiver_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getApps(): array
    {
        return $this->apps;
    }

    /**
     * 类型 apps 原样返回
     * @param $apps
     * @return $this
     */
    public function setApps($apps): EmployeeLeaveRequest
    {
        $this->apps = $apps;
        return $this;
    }

    /**
     * @return array
     */
    public function getEmployeeIds(): array
    {
        return $this->employee_ids;
    }

    /**
     * 员工ID
     * @param $employee_ids
     * @return $this
     */
    public function setEmployeeIds($employee_ids): EmployeeLeaveRequest
    {
        $this->employee_ids = $employee_ids;
        return $this;
    }
}
