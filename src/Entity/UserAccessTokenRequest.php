<?php

namespace UUAI\Sdk\Entity;

class UserAccessTokenRequest extends SplBean
{
    public string $code = '';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
}