<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;
use MegaKit\Huawei\PushKit\Data\Message\Color;
use MegaKit\Huawei\PushKit\Data\Message\Duration;

class AndroidLightSettings implements RequestBodySerializable
{
    /**
     * @var Color
     */
    private $color;

    /**
     * @var Duration
     */
    private $lightOnDuration;

    /**
     * @var Duration
     */
    private $lightOffDuration;

    /**
     * LightSettings constructor.
     * @param Color $color
     * @param Duration $lightOnDuration
     * @param Duration $lightOffDuration
     * @internal
     */
    public function __construct(Color $color, Duration $lightOnDuration, Duration $lightOffDuration)
    {
        $this->color = $color;
        $this->lightOnDuration = $lightOnDuration;
        $this->lightOffDuration = $lightOffDuration;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'color' => $this->color->toRequestBody(),
            'light_on_duration' => (string) $this->lightOnDuration,
            'light_off_duration' => (string) $this->lightOffDuration,
        ];
    }
}
