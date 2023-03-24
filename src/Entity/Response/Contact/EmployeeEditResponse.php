<?php

namespace UUOA\OpenSdk\Entity\Response\Contact;


class EmployeeEditResponse
{
    /**
     * 成员ID
     *
     * @var int
     */
    public int $employee_id;

    /**
     * 姓名
     *
     * @var string
     */
    public string $name;

    /**
     * 头像
     *
     * @var string
     */
    public string $avatar;

    /**
     * 邮箱
     *
     * @var string
     */
    public string $email;

    /**
     * 手机号码
     *
     * @var string
     */
    public string $mobile;

    /**
     * 员工编号
     *
     * @var string
     */
    public string $employee_number;

    /**
     * 员工类型
     *
     * @var int
     */
    public int $employee_type;

    /**
     * 性别0 未知 1 男 2女
     *
     * @var int
     */
    public int $gender;

    /**
     * 状态0 待激活 1 正常 2离职 3暂停账户
     *
     * @var int
     */
    public int $status;

    /**
     * 是否可通过电话呼叫 1是 2否
     *
     * @var int
     */
    public int $phone_call_accessible;

    /**
     * 领导ID
     *
     * @var int
     */
    public int $leader_id;

    /**
     * 钉钉ID
     *
     * @var string
     */
    public string $ding_id;

    /**
     * 部门ID
     *
     * @var int
     */
    public int $department_id;

    /**
     * 创建时间
     *
     * @var string
     */
    public string $created_at;

    /**
     * 更新时间
     *
     * @var string
     */
    public string $updated_at;

    /**
     * 用户离职时间
     *
     * @var string
     */
    public string $user_leave;

    /**
     * 文档是 否删除 1是 0否
     *
     * @var int
     */
    public int $docs;

    /**
     * 离职时间
     *
     * @var string
     */
    public string $out_at;

    /**
     * 入职时间
     *
     * @var string
     */
    public string $join_at;

    /**
     * 操作者ID
     *
     * @var int
     */
    public int $operator_id;

    /**
     * 操作时间
     *
     * @var string
     */
    public string $operator_at;

    /**
     * 租户开放ID
     *
     * @var int
     */
    public int $open_user_id;

    /**
     * 公司ID
     *
     * @var int
     */
    public int $corp_id;

    /**
     * 显示下级部门 0否 1是
     *
     * @var int
     */
    public int $enable_direct_switch;

    /**
     * 是否为超级管理员 0否 1是
     *
     * @var int
     */
    public int $super_administrator;

    /**
     * 是否为子管理员 0否 1是
     *
     * @var int
     */
    public int $child_administrator;

    /**
     * 是否为子管理员 0否 1是
     *
     * @var int
     */
    public int $sub_administrator;

    /**
     * 钉钉部门id
     * @var string
     */
    public string $ding_dept_id;

    /**
     * 上次登录IP
     * @var string
     */
    public string $last_login_ip;

    /**
     * 上次登录时间
     * @var string
     */
    public string $last_login_at;

    /**
     * 入职时间
     * @var string
     */
    public string $hire_time;

    /**
     * 职位
     * @var string
     */
    public string $position;

    /**
     * 钉钉唯一标识
     * @var string
     */
    public string $ding_unionid;

    /**
     * 钉钉id字符串
     * @var string
     */
    public string $ding_id_string;

    /**
     * 删除时间
     * @var string
     */
    public string $deleted_at;

    /**
     * 用户名
     * @var string
     */
    public string $username;

    /**
     * 管理员创建的员工ID
     * @var string
     */
    public string $admin_create_employee_id;

    /**
     * 头像配置
     * @var array
     */
    public array $avatar_config;

    /**
     * 是否是主管 0普通员工 1主管
     * @var int
     */
    public int $is_leader;

    /**
     * 描述
     * @var string
     */
    public string $desc;

    /**
     * 联系方式 0 人员 1 外部联系人
     * @var int
     */
    public int $contact_type;

    /**
     * 过期时间
     * @var string
     */
    public string $expire_time;

    /**
     * 扩展数据
     * @var array
     */
    public array $extension_data;

    /**
     * 设置
     * @var array
     */
    public array $setting;

    /**
     * 冻结状态 状态 0冻结 1正常
     * @var int
     */
    public int $freeze_status;

    /**
     * 自定义头像
     * @var string
     */
    public string $custom_avatar;

    /**
     * 隐藏状态 0 不隐藏 1隐藏
     * @var int
     */
    public int $hidden_type;

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
     * @var int
     */
    public int $select_status;

    /**
     * @param array $responseData
     */
    public function __construct(array $responseData)
    {
        $this->employee_id = $responseData['employee_id'] ?? 0;
        $this->name = $responseData['name'] ?? '';
        $this->avatar = $responseData['avatar'] ?? '';
        $this->email = $responseData['email'] ?? '';
        $this->mobile = $responseData['mobile'] ?? '';
        $this->employee_number = $responseData['employee_number'] ?? '';
        $this->employee_type = $responseData['employee_type'] ?? 0;
        $this->gender = $responseData['gender'] ?? 0;
        $this->status = $responseData['status'] ?? 0;
        $this->phone_call_accessible = $responseData['phone_call_accessible'] ?? 0;
        $this->leader_id = $responseData['leader_id'] ?? 0;
        $this->ding_id = $responseData['ding_id'] ?? '';
        $this->department_id = $responseData['department_id'] ?? 0;
        $this->created_at = $responseData['created_at'] ?? '';
        $this->updated_at = $responseData['updated_at'] ?? '';
        $this->user_leave = $responseData['user_leave'] ?? '';
        $this->docs = $responseData['docs'] ?? 0;
        $this->out_at = $responseData['out_at'] ?? '';
        $this->join_at = $responseData['join_at'] ?? '';
        $this->operator_id = $responseData['operator_id'] ?? 0;
        $this->operator_at = $responseData['operator_at'] ?? '';
        $this->open_user_id = $responseData['open_user_id'] ?? 0;
        $this->corp_id = $responseData['corp_id'] ?? 0;
        $this->enable_direct_switch = $responseData['enable_direct_switch'] ?? 0;
        $this->super_administrator = $responseData['super_administrator'] ?? 0;
        $this->child_administrator = $responseData['child_administrator'] ?? 0;
        $this->sub_administrator = $responseData['sub_administrator'] ?? 0;
        $this->ding_dept_id = $responseData['ding_dept_id'] ?? '';
        $this->last_login_ip = $responseData['last_login_ip'] ?? '';
        $this->last_login_at = $responseData['last_login_at'] ?? '';
        $this->hire_time = $responseData['hire_time'] ?? '';
        $this->position = $responseData['position'] ?? '';
        $this->ding_unionid = $responseData['ding_unionid'] ?? '';
        $this->ding_id_string = $responseData['ding_id_string'] ?? '';
        $this->deleted_at = $responseData['deleted_at'] ?? '';
        $this->username = $responseData['username'] ?? '';
        $this->admin_create_employee_id = $responseData['admin_create_employee_id'] ?? '';
        $this->avatar_config = $responseData['avatar_config'] ?? [];
        $this->is_leader = $responseData['is_leader'] ?? 0;
        $this->desc = $responseData['desc'] ?? '';
        $this->contact_type = $responseData['contact_type'] ?? 0;
        $this->expire_time = $responseData['expire_time'] ?? '';
        $this->extension_data = $responseData['extension_data'] ?? [];
        $this->setting = $responseData['setting'] ?? [];
        $this->freeze_status = $responseData['freeze_status'] ?? 0;
        $this->custom_avatar = $responseData['custom_avatar'] ?? '';
        $this->hidden_type = $responseData['hidden_type'] ?? 0;
        $this->authority = $responseData['authority'] ?? [];
        $this->department = $responseData['department'] ?? [];
        $this->select_status = $responseData['select_status'] ?? 0;
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