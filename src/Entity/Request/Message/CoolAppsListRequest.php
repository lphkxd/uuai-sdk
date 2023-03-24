<?php

namespace UUOA\OpenSdk\Entity\Request\Message;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class CoolAppsListRequest extends BaseRequest
{
    protected int $page = 1;//页码
    protected int $limit = 10;//每页个数

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
    public function setPage($page): CoolAppsListRequest
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
    public function setLimit($limit): CoolAppsListRequest
    {
        $this->limit = $limit;
        return $this;
    }
}