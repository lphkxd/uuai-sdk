<?php

namespace UUOA\OpenSdk\Entity\Request\Connector;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class FlowExecuteRequest extends BaseRequest
{
    protected string $key;//key值
    protected array $data;//数据集
    protected bool $debug;//调试模式

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * key值
     * @param $key
     * @return $this
     */
    public function setKey($key): FlowExecuteRequest
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * 数据集
     * @param $data
     * @return $this
     */
    public function setData($data): FlowExecuteRequest
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->debug;
    }

    /**
     * 调试模式
     * @param $debug
     * @return $this
     */
    public function setDebug($debug): FlowExecuteRequest
    {
        $this->debug = $debug;
        return $this;
    }

}