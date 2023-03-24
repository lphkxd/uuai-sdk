<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class DepartmentTreeStructRequest extends BaseRequest
{
    protected string $corp_code;//企业代码

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
    public function setCorpCode($corp_code): DepartmentTreeStructRequest
    {
        $this->corp_code = $corp_code;
        return $this;
    }
}