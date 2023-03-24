<?php

namespace UUOA\OpenSdk\Entity\Request\Message;

use UUOA\OpenSdk\Entity\Request\BaseRequest;

class SendRequest extends BaseRequest
{
    protected array $ding_unionids;// 员工钉unionidIDs
    protected array $employee_ids;// 员工IDs
    protected array $department_ids;// 部门IDs
    protected array $role_ids;// 部门IDs
    protected int $to_all_user;// 全员通知: 1是, 0否
    protected array $channel;// 通知渠道
    protected int $type;// 消息类型
    protected string $title;// 消息标题
    protected string $content;// 消息内容
    protected string $link_url;// 跳转链接
    protected string $unique;// 唯一值

    /**
     * @return array
     */
    public function getDingUnionids(): array
    {
        return $this->ding_unionids;
    }

    /**
     * 员工钉unionidIDs
     * @param array $ding_unionids
     * @return $this
     */
    public function setDingUnionids(array $ding_unionids): SendRequest
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
     * @param array $employee_ids
     * @return $this
     */
    public function setEmployeeIds(array $employee_ids): SendRequest
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
     * @param array $department_ids
     * @return $this
     */
    public function setDepartmentIds(array $department_ids): SendRequest
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
     * @param array $role_ids
     * @return $this
     */
    public function setRoleIds(array $role_ids): SendRequest
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
     * 全员通知: 1是, 0否
     * @param int $to_all_user
     * @return $this
     */
    public function setToAllUser(int $to_all_user): SendRequest
    {
        $this->to_all_user = $to_all_user;
        return $this;
    }

    /**
     * @return array
     */
    public function getChannel(): array
    {
        return $this->channel;
    }

    /**
     * 通知渠道
     * @param array $channel
     * @return $this
     */
    public function setChannel(array $channel): SendRequest
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * 消息类型
     * @param int $type
     * @return $this
     */
    public function setType(int $type): SendRequest
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * 消息标题
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): SendRequest
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * 消息内容
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): SendRequest
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkUrl(): string
    {
        return $this->link_url;
    }

    /**
     * 跳转链接
     * @param string $link_url
     * @return $this
     */
    public function setLinkUrl(string $link_url): SendRequest
    {
        $this->link_url = $link_url;
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
     * @param string $unique
     * @return $this
     */
    public function setUnique(string $unique): SendRequest
    {
        $this->unique = $unique;
        return $this;
    }
}