<?php

namespace UUOA\OpenSdk\Entity\Request\Contact;


use UUOA\OpenSdk\Entity\Request\BaseRequest;

/**
    'employee_id' => '成员ID',
    'name' => '员工姓名',
    'avatar' => '头像',
    'status' => '状态 3暂停 1 恢复',
    'email' => '邮箱',
    'employee_number' => '员工号',
    'employee_type' => '员工类型',
    'gender' => '性别0 未知 1 男 2女',
    'phone_call_accessible' => '手机号码是否可见',
    'leader_id' => '直属领导',
    'department_id' => '部门ID',
    'order' => '排序',
    'user_leave' => '是否休假 1休假 0否',
    'docs' => '文档是否删除 1是 0否',
    'out_at' => '离职时间',
    'join_at' => '入职时间',
    'operator_id' => '操作人ID',
    'operator_at' => '操作时间',
    'send_invite' => '发送短信邮件邀请',
    'corp_user_id' => '企业用户ID',
    'corp_id' => '企业租户ID',
    'mobile' => '手机号码',
 */
class EmployeeEditRequest extends BaseRequest
{
    protected int $employee_id;
    protected string $name;
    protected string $mobile;
    protected string$avatar;
    protected string $email;
    protected int $employee_type;
    protected int $gender;
    protected int $phone_call_accessible;
    protected int $leader_id;
    protected int $department_id;
    protected string $created_at;
    protected string $updated_at;
    protected int $user_leave;
    protected int $docs;
    protected string $out_at;
    protected string $join_at;
    protected int $operator_id;
    protected string $operator_at;
    protected int $corp_user_id;
    protected int $send_invite;

    /**
     * @return string
     */
    public function getEmployeeId(): string
    {
        return $this->employee_id;
    }

    /**
     * @param $employee_id
     * @return $this
     */
    public function setEmployeeId($employee_id): EmployeeEditRequest
    {
        $this->employee_id = $employee_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name): EmployeeEditRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param $mobile
     * @return $this
     */
    public function setMobile($mobile): EmployeeEditRequest
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param $avatar
     * @return $this
     */
    public function setAvatar($avatar): EmployeeEditRequest
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email): EmployeeEditRequest
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmployeeType(): int
    {
        return $this->employee_type;
    }

    /**
     * @param $employee_type
     * @return $this
     */
    public function setEmployeeType($employee_type): EmployeeEditRequest
    {
        $this->employee_type = $employee_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param $gender
     * @return $this
     */
    public function setGender($gender): EmployeeEditRequest
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhoneCallAccessible(): int
    {
        return $this->phone_call_accessible;
    }

    /**
     * @param $phone_call_accessible
     * @return $this
     */
    public function setPhoneCallAccessible($phone_call_accessible): EmployeeEditRequest
    {
        $this->phone_call_accessible = $phone_call_accessible;
        return $this;
    }

    /**
     * @return int
     */
    public function getLeaderId(): int
    {
        return $this->leader_id;
    }

    /**
     * @param $leader_id
     * @return $this
     */
    public function setLeaderId($leader_id): EmployeeEditRequest
    {
        $this->leader_id = $leader_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->department_id;
    }

    /**
     * @param $department_id
     * @return $this
     */
    public function setDepartmentId($department_id): EmployeeEditRequest
    {
        $this->department_id = $department_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param $created_at
     * @return $this
     */
    public function setCreatedAt($created_at): EmployeeEditRequest
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at): EmployeeEditRequest
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserLeave(): int
    {
        return $this->user_leave;
    }

    /**
     * @param $user_leave
     * @return $this
     */
    public function setUserLeave($user_leave): EmployeeEditRequest
    {
        $this->user_leave = $user_leave;
        return $this;
    }

    /**
     * @return int
     */
    public function getDocs(): int
    {
        return $this->docs;
    }

    /**
     * @param $docs
     * @return $this
     */
    public function setDocs($docs): EmployeeEditRequest
    {
        $this->docs = $docs;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutAt(): string
    {
        return $this->out_at;
    }

    /**
     * @param $out_at
     * @return $this
     */
    public function setOutAt($out_at): EmployeeEditRequest
    {
        $this->out_at = $out_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getJoinAt(): string
    {
        return $this->join_at;
    }

    /**
     * @param $join_at
     * @return $this
     */
    public function setJoinAt($join_at): EmployeeEditRequest
    {
        $this->join_at = $join_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperatorId(): int
    {
        return $this->operator_id;
    }

    /**
     * @param $operator_id
     * @return $this
     */
    public function setOperatorId($operator_id): EmployeeEditRequest
    {
        $this->operator_id = $operator_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorAt(): string
    {
        return $this->operator_at;
    }

    /**
     * @param $operator_at
     * @return $this
     */
    public function setOperatorAt($operator_at): EmployeeEditRequest
    {
        $this->operator_at = $operator_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getCorpUserId(): int
    {
        return $this->corp_user_id;
    }

    /**
     * @param $corp_user_id
     * @return $this
     */
    public function setCorpUserId($corp_user_id): EmployeeEditRequest
    {
        $this->corp_user_id = $corp_user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSendInvite(): int
    {
        return $this->send_invite;
    }

    /**
     * @param $send_invite
     * @return $this
     */
    public function setSendInvite($send_invite): EmployeeEditRequest
    {
        $this->send_invite = $send_invite;
        return $this;
    }
}
