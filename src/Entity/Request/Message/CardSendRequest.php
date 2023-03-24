<?php

namespace UUOA\OpenSdk\Entity\Request\Message;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class CardSendRequest extends BaseRequest
{
    protected array $to_user;//用户id集合
    protected array $base;//基础数据
    protected string $template_id;//模板编号
    protected array $data;//数据
    protected string $unique;//唯一值

    /**
     * @return array
     */
    public function getToUser(): array
    {
        return $this->to_user;
    }

    /**
     * 用户集合
     * @param $to_user
     * @return $this
     */
    public function setToUser($to_user): CardSendRequest
    {
        $this->to_user = $to_user;
        return $this;
    }

    /**
     * @return array
     */
    public function getBase(): array
    {
        return $this->base;
    }

    /**
     * 基础数据
     * @param $base
     * @return $this
     */
    public function setBase($base): CardSendRequest
    {
        $this->base = $base;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateId(): string
    {
        return $this->template_id;
    }

    /**
     * 模板编号或模板数据
     * @param $template_id
     * @return $this
     */
    public function setTemplateId($template_id): CardSendRequest
    {
        $this->template_id = $template_id;
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
     * 数据
     * @param $data
     * @return $this
     */
    public function setData($data): CardSendRequest
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnique(): string
    {
        return $this->unique;
    }

    /**
     * 唯一值
     * @param $unique
     * @return $this
     */
    public function setUnique($unique): CardSendRequest
    {
        $this->unique = $unique;
        return $this;
    }
}
