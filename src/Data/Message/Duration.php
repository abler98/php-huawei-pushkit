<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

class Duration
{
    /**
     * @var float
     */
    private $seconds;

    /**
     * Duration constructor.
     * @param float $seconds
     */
    public function __construct(float $seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * @param float $seconds
     * @return static
     */
    public static function fromSeconds(float $seconds): self
    {
        return new static($seconds);
    }

    /**
     * @param float $minutes
     * @return static
     */
    public static function fromMinutes(float $minutes): self
    {
        return new static($minutes * 60);
    }

    /**
     * @param float $hours
     * @return static
     */
    public static function fromHours(float $hours): self
    {
        return new static($hours * 3600);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%fS', $this->seconds);
    }
}
