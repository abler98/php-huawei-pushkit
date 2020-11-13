<?php

namespace MegaKit\Huawei\PushKit;

class HttpConfig
{
    /**
     * @var int
     */
    private $timeout;

    /**
     * @var string|null
     */
    private $proxy;

    /**
     * HttpConfig constructor.
     * @param int $timeout
     * @param string|null $proxy
     * @internal
     */
    public function __construct(int $timeout, ?string $proxy)
    {
        $this->timeout = $timeout;
        $this->proxy = $proxy;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @return string|null
     */
    public function getProxy(): ?string
    {
        return $this->proxy;
    }
}
