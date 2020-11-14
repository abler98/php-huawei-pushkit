<?php

namespace MegaKit\Huawei\PushKit;

use Webmozart\Assert\Assert;

class HttpConfigBuilder
{
    /**
     * Default request timeout
     */
    private const DEFAULT_TIMEOUT = 60;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var string|null
     */
    private $proxy;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @return static
     */
    public static function withDefaults(): self
    {
        return static::make()->setTimeout(self::DEFAULT_TIMEOUT);
    }

    /**
     * @param int $timeout
     * @return static
     */
    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @param string|null $proxy
     * @return static
     */
    public function setProxy(?string $proxy): self
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * @return HttpConfig
     */
    public function build(): HttpConfig
    {
        Assert::notNull($this->timeout);

        return new HttpConfig(
            $this->timeout,
            $this->proxy
        );
    }
}
