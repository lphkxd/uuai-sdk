<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class DepartmentRequest extends BaseRequest
{
    protected int $page = 1;
    protected int $limit = 10;
    protected string $name;//搜索名称
    protected string $corp_code;//企业代码

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * 页码
     * @param $page
     * @return $this
     */
    public function setPage($page): DepartmentRequest
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
    public function setLimit($limit): DepartmentRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 搜索名称
     * @param $name
     * @return $this
     */
    public function setName($name): DepartmentRequest
    {
        $this->name = $name;
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
    public function setCorpCode($corp_code): DepartmentRequest
    {
        $this->corp_code = $corp_code;
        return $this;
    }
}