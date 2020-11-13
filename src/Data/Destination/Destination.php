<?php

namespace MegaKit\Huawei\PushKit\Data\Destination;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

abstract class Destination implements RequestBodySerializable
{
    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return false;
    }
}
