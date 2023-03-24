<?php

namespace UUOA\OpenSdk\Entity\Response;

class ItemsHasPagesResponse
{
    /**
     * 全部数据
     * @var array
     */
    public array $items;

    /**
     * 页码
     * @var int|mixed
     */
    public int $page;

    /**
     * 是否有下一页 1是 0否
     * @var int|mixed
     */
    public int $has_more;

    /**
     * 总条数
     * @var int|mixed
     */
    public int $total_result;

    public function __construct($responseData)
    {
        $this->items = $responseData['items'] ?? [];
        $this->page = $responseData['page'] ?? 1;
        $this->has_more = $responseData['has_more'] ?? 0;
        $this->total_result = $responseData['total_result'] ?? 0;
    }

    public function __get($name)
    {
        if (!in_array($name, get_object_vars($this))) {
            return null;
        } else {
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        if (!in_array($name, get_object_vars($this))) {
            return;
        } else {
            $this->$name = $value;
        }
    }
}
