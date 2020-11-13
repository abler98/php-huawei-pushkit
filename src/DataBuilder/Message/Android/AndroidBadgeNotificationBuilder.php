<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidBadgeNotification;
use Webmozart\Assert\Assert;

class AndroidBadgeNotificationBuilder
{
    /**
     * @var int
     */
    private $addNum;

    /**
     * @var string
     */
    private $class;

    /**
     * @var int|null
     */
    private $setNum;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param int $addNum
     * @return static
     */
    public function setAddNum(int $addNum): self
    {
        Assert::nullOrGreaterThanEq($addNum, 0);

        $this->addNum = $addNum;

        return $this;
    }

    /**
     * @param string $class
     * @return static
     */
    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @param int|null $setNum
     * @return static
     */
    public function setSetNum(?int $setNum): self
    {
        Assert::nullOrGreaterThanEq($setNum, 0);

        $this->setNum = $setNum;

        return $this;
    }

    /**
     * @return AndroidBadgeNotification
     */
    public function build(): AndroidBadgeNotification
    {
        Assert::notNull($this->addNum);
        Assert::notNull($this->class);

        return new AndroidBadgeNotification(
            $this->addNum,
            $this->class,
            $this->setNum
        );
    }
}
