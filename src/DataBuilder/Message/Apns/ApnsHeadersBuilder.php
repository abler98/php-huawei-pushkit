<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Apns;

use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsHeaders;
use Webmozart\Assert\Assert;

class ApnsHeadersBuilder
{
    /**
     * @var string|null
     */
    private $authorization;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $expiration;

    /**
     * @var int|null
     */
    private $priority;

    /**
     * @var string|null
     */
    private $topic;

    /**
     * @var string|null
     */
    private $collapseId;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string|null $authorization
     * @return static
     */
    public function setAuthorization(?string $authorization): self
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * @param string|null $id
     * @return static
     */
    public function setId(?string $id): self
    {
        Assert::nullOrUuid($id);

        $this->id = $id;

        return $this;
    }

    /**
     * @param int|null $expiration
     * @return static
     */
    public function setExpiration(?int $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @param int|null $priority
     * @return static
     */
    public function setPriority(?int $priority): self
    {
        Assert::nullOrGreaterThanEq($priority, 1);
        Assert::nullOrLessThanEq($priority, 10);

        $this->priority = $priority;

        return $this;
    }

    /**
     * @param string|null $topic
     * @return static
     */
    public function setTopic(?string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * @param string|null $collapseId
     * @return static
     */
    public function setCollapseId(?string $collapseId): self
    {
        $this->collapseId = $collapseId;

        return $this;
    }

    /**
     * @return ApnsHeaders
     */
    public function build(): ApnsHeaders
    {
        return new ApnsHeaders(
            $this->authorization,
            $this->id,
            $this->expiration,
            $this->priority,
            $this->topic,
            $this->collapseId
        );
    }
}
