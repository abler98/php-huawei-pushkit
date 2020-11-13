<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Apns;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class ApnsNotification implements RequestBodySerializable
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
     * ApnsNotification constructor.
     * @param ApnsAlert|null $alert
     * @param bool|null $contentAvailable
     * @param string|null $category
     * @param string|null $threadId
     * @param int|null $badge
     * @param string|null $sound
     * @internal
     */
    public function __construct(
        ?ApnsAlert $alert,
        ?bool $contentAvailable,
        ?string $category,
        ?string $threadId,
        ?int $badge,
        ?string $sound
    ) {
        $this->alert = $alert;
        $this->contentAvailable = $contentAvailable;
        $this->category = $category;
        $this->threadId = $threadId;
        $this->badge = $badge;
        $this->sound = $sound;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'content-available' => $this->contentAvailable,
            'category' => $this->category,
            'thread-id' => $this->threadId,
            'badge' => $this->badge,
            'sound' => $this->sound,
        ];

        if ($this->alert !== null) {
            $body['alert'] = $this->alert->toRequestBody();
        }

        return $body;
    }
}
