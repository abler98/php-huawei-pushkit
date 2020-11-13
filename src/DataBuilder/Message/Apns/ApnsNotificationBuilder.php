<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Apns;

use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsAlert;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsNotification;
use Webmozart\Assert\Assert;

class ApnsNotificationBuilder
{
    /**
     * @var ApnsAlert|null
     */
    private $alert;

    /**
     * @var bool|null
     */
    private $contentAvailable;

    /**
     * @var string|null
     */
    private $category;

    /**
     * @var string|null
     */
    private $threadId;

    /**
     * @var int|null
     */
    private $badge;

    /**
     * @var string|null
     */
    private $sound;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param ApnsAlert|null $alert
     * @return static
     */
    public function setAlert(?ApnsAlert $alert): self
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * @param bool|null $contentAvailable
     * @return static
     */
    public function setContentAvailable(?bool $contentAvailable): self
    {
        $this->contentAvailable = $contentAvailable;

        return $this;
    }

    /**
     * @param string|null $category
     * @return static
     */
    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @param string|null $threadId
     * @return static
     */
    public function setThreadId(?string $threadId): self
    {
        $this->threadId = $threadId;

        return $this;
    }

    /**
     * @param int|null $badge
     * @return static
     */
    public function setBadge(?int $badge): self
    {
        Assert::nullOrGreaterThanEq($badge, 0);

        $this->badge = $badge;

        return $this;
    }

    /**
     * @param string|null $sound
     * @return static
     */
    public function setSound(?string $sound): self
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @return ApnsNotification
     */
    public function build(): ApnsNotification
    {
        return new ApnsNotification(
            $this->alert,
            $this->contentAvailable,
            $this->category,
            $this->threadId,
            $this->badge,
            $this->sound
        );
    }
}
