<?php

namespace MegaKit\Huawei\PushKit\Data;

class SendResult
{
    /**
     * @var string[]
     */
    private $illegalTokens = [];

    /**
     * @return static
     */
    public static function success(): self
    {
        return new static();
    }

    /**
     * @param FailuresResponse $response
     * @return static
     */
    public static function withFailures(FailuresResponse $response): self
    {
        $result = new static();

        $result->setIllegalTokens($response->getIllegalTokens());

        return $result;
    }

    /**
     * @param string[] $illegalTokens
     */
    public function setIllegalTokens(array $illegalTokens): void
    {
        $this->illegalTokens = $illegalTokens;
    }

    /**
     * @return bool
     */
    public function hasFailures(): bool
    {
        return ! empty($this->illegalTokens);
    }

    /**
     * @return string[]
     */
    public function getIllegalTokens(): array
    {
        return $this->illegalTokens;
    }
}
