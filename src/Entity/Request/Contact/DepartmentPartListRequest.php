<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class DepartmentPartListRequest extends BaseRequest
{
    protected string $department_ids;//必传 部门id集合  1,2,3
    protected bool $simple = true;//true 简单数据，false 复杂数据

    /**
     * @return string
     */
    public function getDepartmentIds(): string
    {
        return $this->department_ids;
    }

    /**
     * 部门id集合 必传 1,2
     * @param $department_ids
     * @return $this
     */
    public function setDepartmentIds($department_ids): DepartmentPartListRequest
    {
        $this->department_ids = $department_ids;
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
    public function setSimple($simple): DepartmentPartListRequest
    {
        $this->simple = $simple;
        return $this;
    }
}