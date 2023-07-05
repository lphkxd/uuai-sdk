<?php

namespace UUAI\Sdk\Entity;

class BuildConfigRequest extends SplBean
{
    public int $id = 0;
    public array $jsApiList = [];
    public array $user = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->user['name'] ?? '';
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->user['name'] = $name;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->user['nickname'] ?? '';
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->user['nickname'] = $nickname;

    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->user['avatar'] ?? '';
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->user['avatar'] = $avatar;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user['id'] ?? '';
    }

    /**
     * @param int $id
     */
    public function setUserId(int $id): void
    {
        $this->user['id'] = $id;
    }

    /**
     * @return array
     */
    public function getJsApiList(): array
    {
        return $this->jsApiList;
    }

    /**
     * @param array $jsApiList
     */
    public function setJsApiList(array $jsApiList): void
    {
        $this->jsApiList = $jsApiList;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getUser(): array
    {
        return $this->user;
    }

    /**
     * @param array $user
     */
    public function setUser(array $user): void
    {
        $this->user = $user;
    }
}