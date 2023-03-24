<?php

namespace UUOA\OpenSdk\Entity\Response\Message;

class MessageResponse
{
    /**
     * 全部数据
     * @var array
     */
    public array $items;

    /**
     * data
     * @var array|mixed
     */
    public array $data;

    /**
     * message
     * @var string|mixed
     */
    public string $message;

    public function __construct($responseData)
    {
        $this->items = $responseData ?? [];
        $this->data = $responseData['data'] ?? [];
        $this->message = $responseData['message'] ?? 'none';
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