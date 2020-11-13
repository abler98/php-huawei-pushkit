<?php

namespace MegaKit\Huawei\PushKit\Data;

class FailuresResponse
{
    /**
     * @var int
     */
    private $success;

    /**
     * @var int
     */
    private $failure;

    /**
     * @var string[]
     */
    private $illegalTokens;

    /**
     * FailuresResponse constructor.
     * @param int $success
     * @param int $failure
     * @param string[] $illegalTokens
     */
    public function __construct(int $success, int $failure, array $illegalTokens)
    {
        $this->success = $success;
        $this->failure = $failure;
        $this->illegalTokens = $illegalTokens;
    }

    /**
     * @return int
     */
    public function getSuccess(): int
    {
        return $this->success;
    }

    /**
     * @return int
     */
    public function getFailure(): int
    {
        return $this->failure;
    }

    /**
     * @return string[]
     */
    public function getIllegalTokens(): array
    {
        return $this->illegalTokens;
    }
}
