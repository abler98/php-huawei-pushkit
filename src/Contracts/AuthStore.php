<?php

namespace MegaKit\Huawei\PushKit\Contracts;

use MegaKit\Huawei\PushKit\Data\Auth\Credentials;
use MegaKit\Huawei\PushKit\Data\Auth\PersistableCredentials;

interface AuthStore
{
    /**
     * @param string $key
     * @return Credentials|null
     */
    public function getCredentials(string $key): ?PersistableCredentials;

    /**
     * @param string $key
     * @param PersistableCredentials $credentials
     * @return void
     */
    public function setCredentials(string $key, PersistableCredentials $credentials): void;

    /**
     * @param string $key
     * @return void
     */
    public function deleteCredentials(string $key): void;
}
