<?php

namespace UUAI\Sdk\Entity;

class ChatRequest extends SplBean
{


    protected ?\Closure $callback = null;
    protected bool $stream = false;

    protected ?float $temperature = 0;
    protected string $model = '';
    protected ?float $top_p = 0;
    protected ?float $frequency_penalty = 0;
    protected ?float $presence_penalty = 0;
    protected int $max_tokens = 500;
    protected int $open_user_id = 0;
    protected array $stop = [
        "\n"
    ];
    protected array $messages = [
    ];

    /**
     * @return bool
     */
    public function getStream(): bool
    {
        return $this->stream;
    }

    
    /**
     * @param bool $stream
     */
    public function setOpenUserId(int $open_user_id): void
    {
        $this->open_user_id = $open_user_id;
    }


    /**
     * @param bool $stream
     */
    public function setStream(bool $stream): void
    {
        $this->stream = $stream;
    }

    /**
     * @return \Closure|null
     */
    public function getCallback(): ?\Closure
    {
        return $this->callback;
    }

    /**
     * @param \Closure|null $callback
     */
    public function setCallback(?\Closure $callback): void
    {
        $this->callback = $callback;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return float|null
     */
    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    /**
     * @param float|null $temperature
     */
    public function setTemperature(?float $temperature): void
    {
        $this->temperature = $temperature;
    }

    /**
     * @return float|null
     */
    public function getTopP(): ?float
    {
        return $this->top_p;
    }

    /**
     * @param float|null $top_p
     */
    public function setTopP(?float $top_p): void
    {
        $this->top_p = $top_p;
    }

    /**
     * @return float|null
     */
    public function getFrequencyPenalty(): ?float
    {
        return $this->frequency_penalty;
    }

    /**
     * @param float|null $frequency_penalty
     */
    public function setFrequencyPenalty(?float $frequency_penalty): void
    {
        $this->frequency_penalty = $frequency_penalty;
    }

    /**
     * @return float|null
     */
    public function getPresencePenalty(): ?float
    {
        return $this->presence_penalty;
    }

    /**
     * @param float|null $presence_penalty
     */
    public function setPresencePenalty(?float $presence_penalty): void
    {
        $this->presence_penalty = $presence_penalty;
    }

    /**
     * @return int
     */
    public function getMaxTokens(): int
    {
        return $this->max_tokens;
    }

    /**
     * @param int $max_tokens
     */
    public function setMaxTokens(int $max_tokens): void
    {
        $this->max_tokens = $max_tokens;
    }

    /**
     * @return array
     */
    public function getStop(): array
    {
        return $this->stop;
    }

    /**
     * @param array $stop
     */
    public function setStop(array $stop): void
    {
        $this->stop = $stop;
    }


    public function toArray(array $columns = null, $filter = null): array
    {
        $array = parent::toArray($columns, $filter);
        unset($array['callback']);
        return $array;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
    }

    public function addMessage($message, $role = 'user'): void
    {
        $this->messages[] = [
            'role' => $role,
            'content' => $message
        ];
    }
}