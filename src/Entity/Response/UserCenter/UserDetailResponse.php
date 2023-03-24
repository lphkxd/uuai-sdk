<?php

namespace UUOA\OpenSdk\Entity\Response\UserCenter;


class UserDetailResponse
{

    /**
     * 全部数据
     * @var array
     */
    public array $items;

    /**
     * @var int $userId APP用户ID
     */
    public int $userId;

    /**
     * @var int $current_user_id 最后切换用户ID
     */
    public int $current_user_id;

    /**
     * @var string $name 个人名称
     */
    public string $name;

    /**
     * @var string $avatar 头像
     */
    public string $avatar;

    /**
     * @var string $username 用户名
     */
    public string $username;

    /**
     * @var string $password 登录密码
     */
    public string $password;

    /**
     * @var string $register_ip 注册 IP
     */
    public string $register_ip;

    /**
     * @var string $last_login_ip 最近登录 IP
     */
    public string $last_login_ip;

    /**
     * @var string $created_at 创建时间
     */
    public string $created_at;

    /**
     * @var string $updated_at 更新时间
     */
    public string $updated_at;

    /**
     * @var string $last_at 最后登录时间
     */
    public string $last_at;

    /**
     * @var string $ding_id ding_id
     */
    public string $ding_id;

    /**
     * @var string $ding_unionid ding_unionid
     */
    public string $ding_unionid;

    /**
     * @var string $email email
     */
    public string $email;

    /**
     * @var string $mobile mobile
     */
    public string $mobile;

    /**
     * @var int $sex 性别 1 男 2 女
     */
    public int $sex;

    /**
     * @var int $status 状态 0 冻结 1 正常
     */
    public int $status;

    /**
     * @var string $weixin_openid 微信openid
     */
    public string $weixin_openid;

    /**
     * @var string $weixin_unionid 微信unionid
     */
    public string $weixin_unionid;

    public function __construct($responseData)
    {
        $this->items = $responseData['items'] ?? [];
        $this->user_id = $responseData['user_id'] ?? 0;
        $this->current_user_id = $responseData['current_user_id'] ?? 0;
        $this->name = $responseData['name'] ?? '';
        $this->avatar = $responseData['avatar'] ?? '';
        $this->username = $responseData['username'] ?? '';
        $this->password = $responseData['password'] ?? '';
        $this->register_ip = $responseData['register_ip'] ?? '';
        $this->last_login_ip = $responseData['last_login_ip'] ?? '';
        $this->created_at = $responseData['created_at'] ?? '';
        $this->updated_at = $responseData['updated_at'] ?? '';
        $this->last_at = $responseData['last_at'] ?? '';
        $this->ding_id = $responseData['ding_id'] ?? '';
        $this->ding_unionid = $responseData['ding_unionid'] ?? '';
        $this->email = $responseData['email'] ?? '';
        $this->mobile = $responseData['mobile'] ?? '';
        $this->sex = $responseData['sex'] ?? '';
        $this->status = $responseData['status'] ?? '';
        $this->weixin_openid = $responseData['weixin_openid'] ?? '';
        $this->weixin_unionid = $responseData['weixin_unionid'] ?? '';
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