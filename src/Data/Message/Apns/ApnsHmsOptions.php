<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Apns;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class ApnsHmsOptions implements RequestBodySerializable
{
    /**
     * Test user
     */
    const TARGET_USER_TYPE_TEST = 1;

    /**
     * Formal user
     */
    const TARGET_USER_TYPE_FORMAL = 2;

    /**
     * VoIP user
     */
    const TARGET_USER_TYPE_VOIP = 3;

    /**
     * @var int
     */
    private $targetUserType;

    /**
     * ApnsHmsOptions constructor.
     * @param int $targetUserType
     * @internal
     */
    public function __construct(int $targetUserType)
    {
        $this->targetUserType = $targetUserType;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'target_user_type' => $this->targetUserType,
        ];
    }
}
