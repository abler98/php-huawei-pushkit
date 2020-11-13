<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Apns;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class ApnsHeaders implements RequestBodySerializable
{
    /**
     * High push priority
     */
    const PRIORITY_HIGH = 10;

    /**
     * Normal push priority
     */
    const PRIORITY_NORMAL = 5;

    /**
     * Low push priority
     */
    const PRIORITY_LOW = 1;

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
     * ApnsHeaders constructor.
     * @param string|null $authorization
     * @param string|null $id
     * @param int|null $expiration
     * @param int|null $priority
     * @param string|null $topic
     * @param string|null $collapseId
     * @internal
     */
    public function __construct(
        ?string $authorization,
        ?string $id,
        ?int $expiration,
        ?int $priority,
        ?string $topic,
        ?string $collapseId
    ) {
        $this->authorization = $authorization;
        $this->id = $id;
        $this->expiration = $expiration;
        $this->priority = $priority;
        $this->topic = $topic;
        $this->collapseId = $collapseId;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $priority = $this->priority;

        if (! is_null($priority)) {
            $priority = (string) $priority;
        }

        return [
            'authorization' => $this->authorization,
            'apns-id' => $this->id,
            'apns-expiration' => $this->expiration,
            'apns-priority' => $priority,
            'apns-topic' => $this->topic,
            'apns-collapse-id' => $this->collapseId,
        ];
    }
}
