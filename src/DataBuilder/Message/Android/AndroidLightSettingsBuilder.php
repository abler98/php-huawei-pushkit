<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidLightSettings;
use MegaKit\Huawei\PushKit\Data\Message\Color;
use MegaKit\Huawei\PushKit\Data\Message\Duration;
use Webmozart\Assert\Assert;

class AndroidLightSettingsBuilder
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param Color $color
     * @return static
     */
    public function setColor(Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param Duration $lightOnDuration
     * @return static
     */
    public function setLightOnDuration(Duration $lightOnDuration): self
    {
        $this->lightOnDuration = $lightOnDuration;

        return $this;
    }

    /**
     * @param Duration $lightOffDuration
     * @return static
     */
    public function setLightOffDuration(Duration $lightOffDuration): self
    {
        $this->lightOffDuration = $lightOffDuration;

        return $this;
    }

    /**
     * @return AndroidLightSettings
     */
    public function build(): AndroidLightSettings
    {
        Assert::notNull($this->color);
        Assert::notNull($this->lightOnDuration);
        Assert::notNull($this->lightOffDuration);

        return new AndroidLightSettings(
            $this->color,
            $this->lightOnDuration,
            $this->lightOffDuration
        );
    }
}
