<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class AndroidConfig implements RequestBodySerializable
{
    /**
     * Delivery priority - high
     */
    const URGENCY_HIGH = 'HIGH';

    /**
     * Delivery priority - normal
     */
    const URGENCY_NORMAL = 'NORMAL';

    /**
     * Voice playing
     */
    const CATEGORY_PLAY_VOICE = 'PLAY_VOICE';

    /**
     * VoIP call
     */
    const CATEGORY_VOIP = 'VOIP';

    /**
     * Development state
     */
    const FAST_APP_TARGET_DEVELOPMENT = 1;

    /**
     * Production state
     */
    const FAST_APP_TARGET_PRODUCTION = 2;

    /**
     * @var int|null
     */
    private $collapseKey;

    /**
     * @var string|null
     */
    private $urgency;

    /**
     * @var string|null
     */
    private $category;

    /**
     * @var int|null
     */
    private $ttl;

    /**
     * @var string|null
     */
    private $biTag;

    /**
     * @var int|null
     */
    private $fastAppTarget;

    /**
     * @var array|null
     */
    private $data;

    /**
     * @var AndroidNotification|null
     */
    private $notification;

    /**
     * AndroidConfig constructor.
     * @param int|null $collapseKey
     * @param string|null $urgency
     * @param string|null $category
     * @param int|null $ttl
     * @param string|null $biTag
     * @param int|null $fastAppTarget
     * @param array|null $data
     * @param AndroidNotification|null $notification
     * @internal
     */
    public function __construct(
        ?int $collapseKey,
        ?string $urgency,
        ?string $category,
        ?int $ttl,
        ?string $biTag,
        ?int $fastAppTarget,
        ?array $data,
        ?AndroidNotification $notification
    ) {
        $this->collapseKey = $collapseKey;
        $this->urgency = $urgency;
        $this->category = $category;
        $this->ttl = $ttl;
        $this->biTag = $biTag;
        $this->fastAppTarget = $fastAppTarget;
        $this->data = $data;
        $this->notification = $notification;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'collapse_key' => $this->collapseKey,
            'urgency' => $this->urgency,
            'category' => $this->category,
            'ttl' => $this->ttl,
            'bi_tag' => $this->biTag,
            'fast_app_target' => $this->fastAppTarget,
        ];

        if ($this->data !== null) {
            $body['data'] = json_encode($this->data);
        }

        if ($this->notification !== null) {
            $body['notification'] = $this->notification->toRequestBody();
        }

        return $body;
    }
}
