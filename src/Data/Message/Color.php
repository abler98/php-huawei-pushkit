<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class Color implements RequestBodySerializable
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
     * Color constructor.
     * @param float|null $alpha
     * @param float|null $red
     * @param float|null $green
     * @param float|null $blue
     * @internal
     */
    public function __construct(?float $alpha, ?float $red, ?float $green, ?float $blue)
    {
        $this->alpha = $alpha;
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'alpha' => $this->alpha,
            'red' => $this->red,
            'green' => $this->green,
            'blue' => $this->blue,
        ];
    }
}
