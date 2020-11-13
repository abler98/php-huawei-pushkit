<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidVibrateConfig;
use MegaKit\Huawei\PushKit\Data\Message\Duration;
use Webmozart\Assert\Assert;

class AndroidVibrateConfigBuilder
{
    /**
     * @var Duration[]
     */
    private $durations = [];

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param Duration[] $durations
     * @return static
     */
    public function setDurations(array $durations): self
    {
        Assert::isNonEmptyList($durations);
        Assert::allIsInstanceOf($durations, Duration::class);

        $this->durations = $durations;

        return $this;
    }

    /**
     * @param Duration $duration
     * @return static
     */
    public function addDuration(Duration $duration): self
    {
        $this->durations[] = $duration;

        return $this;
    }

    /**
     * @return AndroidVibrateConfig
     */
    public function build(): AndroidVibrateConfig
    {
        Assert::isNonEmptyList($this->durations);

        return new AndroidVibrateConfig($this->durations);
    }
}
