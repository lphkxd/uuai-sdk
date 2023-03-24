<?php

namespace UUOA\OpenSdk\Entity\Request\Message;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class PushRequest extends BaseRequest
{
    protected string $event_name;// 事件名称 默认oa_index_notice
    protected array $ding_unionids;// 员工钉unionidIDs
    protected array $employee_ids;// 员工IDs
    protected array $department_ids;// 部门IDs
    protected array $role_ids;// 角色IDs
    protected int $to_all_user;// 全员通知
    protected array $data;// 数据
    protected string $unique;// 唯一值

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->event_name;
    }

    /**
     * 事件名称 默认oa_index_notice
     * @param $event_name
     * @return $this
     */
    public function setEventName($event_name): PushRequest
    {
        $this->event_name = $event_name;
        return $this;
    }

    /**
     * @return array
     */
    public function getDingUnionids(): array
    {
        return $this->ding_unionids;
    }

    /**
     * 员工钉unionidIDs
     * @param $ding_unionids
     * @return $this
     */
    public function setDingUnionids($ding_unionids): PushRequest
    {
        $this->ding_unionids = $ding_unionids;
        return $this;
    }

    /**
     * @return array
     */
    public function getEmployeeIds(): array
    {
        return $this->employee_ids;
    }

    /**
     * 员工IDs
     * @param $employee_ids
     * @return $this
     */
    public function setEmployeeIds($employee_ids): PushRequest
    {
        $this->employee_ids = $employee_ids;
        return $this;
    }

    /**
     * @return array
     */
    public function getDepartmentIds(): array
    {
        return $this->department_ids;
    }

    /**
     * 部门IDs
     * @param $department_ids
     * @return $this
     */
    public function setDepartmentIds($department_ids): PushRequest
    {
        $this->department_ids = $department_ids;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoleIds(): array
    {
        return $this->role_ids;
    }

    /**
     * 角色IDs
     * @param $role_ids
     * @return $this
     */
    public function setRoleIds($role_ids): PushRequest
    {
        $this->role_ids = $role_ids;
        return $this;
    }

    /**
     * @return int
     */
    public function getToAllUser(): int
    {
        return $this->to_all_user;
    }

    /**
     * 全员通知
     * @param $to_all_user
     * @return $this
     */
    public function setToAllUser($to_all_user): PushRequest
    {
        $this->to_all_user = $to_all_user;
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
    public function setData($data): PushRequest
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
    public function setUnique($unique): PushRequest
    {
        $this->unique = $unique;
        return $this;
    }
}
