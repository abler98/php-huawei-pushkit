<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;
use MegaKit\Huawei\PushKit\Data\Message\Duration;

class AndroidVibrateConfig implements RequestBodySerializable
{
    /**
     * @var Duration[]
     */
    private $durations;

    /**
     * AndroidVibrateConfig constructor.
     * @param Duration[] $durations
     * @internal
     */
    public function __construct(array $durations)
    {
        $this->durations = $durations;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return array_map(function (Duration $duration) {
            return (string) $duration;
        }, $this->durations);
    }
}
