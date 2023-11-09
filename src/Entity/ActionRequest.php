<?php

namespace UUAI\Sdk\Entity;

class ActionRequest extends SplBean
{
    public int $dec_key_number = 0;
    public int $user_id = 0;
    public int $team_corp_id = 0;
    public string $engine = '';
    public string $api = '';
    public string $remark = '';
    public ?string $prompt = '';
    public array $options = [];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return string|null
     */
    public function getPrompt(): ?string
    {
        return $this->prompt;
    }

    /**
     * @param string|null $prompt
     */
    public function setPrompt(?string $prompt): void
    {
        $this->prompt = $prompt;
    }

    /**
     * @return int
     */
    public function getDecKeyNumber(): int
    {
        return $this->dec_key_number;
    }

    /**
     * @param int $dec_key_number
     */
    public function setDecKeyNumber(int $dec_key_number): void
    {
        $this->dec_key_number = $dec_key_number;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * @param string $engine
     */
    public function setEngine(string $engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return string
     */
    public function getApi(): string
    {
        return $this->api;
    }

    /**
     * @param string $api
     */
    public function setApi(string $api): void
    {
        $this->api = $api;
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return int
     */
    public function getTeamCorpId(): int
    {
        return $this->team_corp_id;
    }

    /**
     * @param int $team_corp_id
     */
    public function setTeamCorpId(int $team_corp_id): void
    {
        $this->team_corp_id = $team_corp_id;
    }
}
