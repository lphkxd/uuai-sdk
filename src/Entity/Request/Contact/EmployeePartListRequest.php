<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class EmployeePartListRequest extends BaseRequest
{
    protected string $employee_ids;//部门ID集合
    protected bool $simple = true;//true 简单数据，false 复杂数据

    /**
     * @return string
     */
    public function getEmployeeIds(): string
    {
        return $this->employee_ids;
    }

    /**
     * 部门ID集合
     * @param $employee_ids
     * @return $this
     */
    public function setEmployeeIds($employee_ids): EmployeePartListRequest
    {
        $this->employee_ids = $employee_ids;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSimple(): bool
    {
        return $this->simple;
    }

    /**
     * true 简单数据，false 复杂数据
     * @param $simple
     * @return $this
     */
    public function setSimple($simple): EmployeePartListRequest
    {
        $this->simple = $simple;
        return $this;
    }
}