<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message;

use MegaKit\Huawei\PushKit\Data\Message\Color;
use Webmozart\Assert\Assert;

class ColorBuilder
{
    /**
     * @var float|null
     */
    private $alpha;

    /**
     * @var float|null
     */
    private $red;

    /**
     * @var float|null
     */
    private $green;

    /**
     * @var float|null
     */
    private $blue;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param float|null $alpha
     * @return static
     */
    public function setAlpha(?float $alpha): self
    {
        Assert::nullOrGreaterThanEq($alpha, 0);
        Assert::nullOrLessThanEq($alpha, 255);

        $this->alpha = $alpha;

        return $this;
    }

    /**
     * @param float|null $red
     * @return static
     */
    public function setRed(?float $red): self
    {
        Assert::nullOrGreaterThanEq($red, 0);
        Assert::nullOrLessThanEq($red, 255);

        $this->red = $red;

        return $this;
    }

    /**
     * @param float|null $green
     * @return static
     */
    public function setGreen(?float $green): self
    {
        Assert::nullOrGreaterThanEq($green, 0);
        Assert::nullOrLessThanEq($green, 255);

        $this->green = $green;

        return $this;
    }

    /**
     * @param float|null $blue
     * @return static
     */
    public function setBlue(?float $blue): self
    {
        Assert::nullOrGreaterThanEq($blue, 0);
        Assert::nullOrLessThanEq($blue, 255);

        $this->blue = $blue;

        return $this;
    }

    /**
     * @return Color
     */
    public function build(): Color
    {
        return new Color(
            $this->alpha,
            $this->red,
            $this->green,
            $this->blue
        );
    }
}
