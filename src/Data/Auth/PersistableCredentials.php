<?php

namespace MegaKit\Huawei\PushKit\Data\Auth;

use DateTimeInterface;

abstract class PersistableCredentials extends Credentials
{
    /**
     * @return DateTimeInterface|null
     */
    public abstract function getExpiresAt(): ?DateTimeInterface;
}
