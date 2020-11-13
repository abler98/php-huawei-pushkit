<?php

namespace MegaKit\Huawei\PushKit\Auth;

use MegaKit\Huawei\PushKit\Config\ApiKeyConfig;
use MegaKit\Huawei\PushKit\Contracts\AuthProvider;
use MegaKit\Huawei\PushKit\Data\Auth\ApiKey;
use MegaKit\Huawei\PushKit\Data\Auth\Credentials;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\HuaweiConfig;

class ApiKeyProvider implements AuthProvider
{
    /**
     * @param HuaweiConfig $config
     * @return Credentials
     * @throws HuaweiException
     */
    public function getCredentials(HuaweiConfig $config): Credentials
    {
        $authConfig = $config->getAuthConfig();

        if (! $authConfig instanceof ApiKeyConfig) {
            throw new HuaweiException('Unsupported auth config');
        }

        return new ApiKey($authConfig->getApiKey());
    }

    /**
     * @param HuaweiConfig $config
     * @return void
     */
    public function invalidateCredentials(HuaweiConfig $config): void
    {
        //
    }
}
