<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;


use UUOA\OpenSdk\Entity\Request\BaseRequest;

class EmployersRequest extends BaseRequest
{
    protected int $page = 1;
    protected int $limit = 10;
    protected int $department_id;//部门id
    protected string $corp_code;//企业代码

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * 页数
     * @param $page
     * @return $this
     */
    public function setPage($page): EmployersRequest
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * 每页个数
     * @param $limit
     * @return $this
     */
    public function setLimit($limit): EmployersRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->department_id;
    }

    /**
     * 部门id
     * @param $department_id
     * @return $this
     */
    public function setDepartmentId($department_id): EmployersRequest
    {
        $this->department_id = $department_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCorpCode(): string
    {
        return $this->corp_code;
    }

    /**
     * 企业代码
     * @param $corp_code
     * @return $this
     */
    public function setCorpCode($corp_code): EmployersRequest
    {
        $this->corp_code = $corp_code;
        return $this;
    }
}