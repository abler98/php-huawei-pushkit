<?php

namespace MegaKit\Huawei\PushKit\Auth;

use DateTime;
use MegaKit\Huawei\PushKit\Contracts\AuthStore;
use MegaKit\Huawei\PushKit\Data\Auth\PersistableCredentials;

class InMemoryAuthStore implements AuthStore
{
    /**
     * @var PersistableCredentials[]
     */
    private $credentials = [];

    /**
     * @param string $key
     * @return PersistableCredentials|null
     */
    public function getCredentials(string $key): ?PersistableCredentials
    {
        $credentials = $this->credentials[$key] ?? null;

        if (! is_null($credentials)) {
            $expiresAt = $credentials->getExpiresAt();
            if (! is_null($expiresAt) && $this->now() >= $expiresAt) {
                $credentials = null;
                $this->deleteCredentials($key);
            }
        }

        return $credentials;
    }

    /**
     * @param string $key
     * @param PersistableCredentials $credentials
     * @return void
     */
    public function setCredentials(string $key, PersistableCredentials $credentials): void
    {
        $this->credentials[$key] = $credentials;
    }

    /**
     * @param string $key
     * @return void
     */
    public function deleteCredentials(string $key): void
    {
        unset($this->credentials[$key]);
    }

    /**
     * @return DateTime
     */
    protected function now(): DateTime
    {
        return new DateTime();
    }
}
