<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class EmployeeHrmRequest extends BaseRequest
{
    protected string $ding_ids;//成员钉ID集合
    protected string $field_filter_list;//需要获取的花名册字段值列表;性别字段sys02-sexType

    /**
     * @return string
     */
    public function getDingIds(): string
    {
        return $this->ding_ids;
    }

    /**
     * 成员钉ID集合
     * @param $ding_ids
     * @return $this
     */
    public function setDingIds($ding_ids): EmployeeHrmRequest
    {
        $this->ding_ids = $ding_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldFilterList(): string
    {
        return $this->field_filter_list;
    }

    /**
     * 需要获取的花名册字段值列表;性别字段sys02-sexType
     * @param $field_filter_list
     * @return $this
     */
    public function setFieldFilterList($field_filter_list): EmployeeHrmRequest
    {
        $this->field_filter_list = $field_filter_list;
        return $this;
    }
}