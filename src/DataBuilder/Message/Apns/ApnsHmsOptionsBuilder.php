<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Apns;

use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsHmsOptions;
use Webmozart\Assert\Assert;

class ApnsHmsOptionsBuilder
{
    /**
     * @var int
     */
    private $targetUserType;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param int $targetUserType
     * @return static
     */
    public function setTargetUserType(int $targetUserType): self
    {
        Assert::inArray($targetUserType, [
            ApnsHmsOptions::TARGET_USER_TYPE_TEST,
            ApnsHmsOptions::TARGET_USER_TYPE_FORMAL,
            ApnsHmsOptions::TARGET_USER_TYPE_VOIP,
        ]);

        $this->targetUserType = $targetUserType;

        return $this;
    }

    /**
     * @return ApnsHmsOptions
     */
    public function build(): ApnsHmsOptions
    {
        Assert::notNull($this->targetUserType);

        return new ApnsHmsOptions($this->targetUserType);
    }
}
