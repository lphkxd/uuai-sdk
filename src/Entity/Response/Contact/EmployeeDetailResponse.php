<?php

namespace UUOA\OpenSdk\Entity\Response\Contact;


use ReflectionClass;

class EmployeeDetailResponse
{
    /**
     * 全部数据
     * @var array
     */
    public array $items;

    /**
     * 是否可通话
     * @var bool
     */
    public bool $phone_call_accessible;

    /**
     * 钉钉unionid
     * @var string
     */
    public string $ding_unionid;

    /**
     * 职位
     * @var string
     */
    public string $position;

    /**
     * 入职时间（时间戳）
     * @var int
     */
    public int $hire_time;

    /**
     * 加入公司的时间（时间戳）
     * @var int
     */
    public int $join_at;

    /**
     * 是否是领导
     * @var bool
     */
    public bool $is_leader;

    /**
     * 员工编号
     * @var int
     */
    public int $employee_number;

    /**
     * 员工ID
     * @var int
     */
    public int $employee_id;

    /**
     * 员工姓名
     * @var string
     */
    public string $name;

    /**
     * 员工头像
     * @var string
     */
    public string $avatar;

    /**
     * 员工所在部门ID
     * @var int
     */
    public int $department_id;

    /**
     * 手机号码
     * @var string
     */
    public string $mobile;

    /**
     * 用户名
     * @var string
     */
    public string $username;

    /**
     * 电子邮件
     * @var string
     */
    public string $email;

    /**
     * 钉钉ID
     * @var string
     */
    public string $ding_id;

    /**
     * 权限
     * @var array
     */
    public array $authority;

    /**
     * 部门
     * @var array
     */
    public array $department;

    /**
     * 选择状态
     * @var string
     */
    public string $select_status;


    public function __construct($responseData)
    {
        $this->items = $responseData ?? [];
        $this->phone_call_accessible = $responseData['phone_call_accessible'] ?? false;
        $this->ding_unionid = $responseData['ding_unionid'] ?? '';
        $this->position = $responseData['position'] ?? '';
        $this->hire_time = $responseData['hire_time'] ?? 0;
        $this->join_at = $responseData['join_at'] ?? 0;
        $this->is_leader = $responseData['is_leader'] ?? false;
        $this->employee_number = $responseData['employee_number'] ?? 0;
        $this->employee_id = $responseData['employee_id'] ?? 0;
        $this->name = $responseData['name'] ?? '';
        $this->avatar = $responseData['avatar'] ?? '';
        $this->department_id = $responseData['department_id'] ?? 0;
        $this->mobile = $responseData['mobile'] ?? '';
        $this->username = $responseData['username'] ?? '';
        $this->email = $responseData['email'] ?? '';
        $this->ding_id = $responseData['ding_id'] ?? '';
        $this->authority = $responseData['authority'] ?? [];
        $this->department = $responseData['department'] ?? [];
        $this->select_status = $responseData['select_status'] ?? '';
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