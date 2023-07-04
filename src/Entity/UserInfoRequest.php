<?php

namespace UUAI\Sdk\Entity;

class UserInfoRequest extends SplBean
{
    public string $corp_code = '';

    /**
     * @return string
     */
    public function getCorpCode(): string
    {
        return $this->corp_code;
    }

    /**
     * @param string $corp_code
     */
    public function setCorpCode(string $corp_code): void
    {
        $this->corp_code = $corp_code;
    }
}