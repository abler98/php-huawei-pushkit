<?php

namespace MegaKit\Huawei\PushKit\Contracts;

interface RequestBodySerializable
{
    /**
     * @return array
     */
    public function toRequestBody(): array;
}
