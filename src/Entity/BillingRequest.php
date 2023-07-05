<?php

namespace UUAI\Sdk\Entity;

class BillingRequest extends SplBean
{
    public int $dec_key_number = 0;
    public int $user_id = 0;
    public string $engine = '';
    public string $api = '';

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
}