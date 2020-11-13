<?php

namespace MegaKit\Huawei\PushKit\Contracts;

use MegaKit\Huawei\PushKit\Data\Auth\Credentials;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\HuaweiConfig;

interface AuthProvider
{
    /**
     * @param HuaweiConfig $config
     * @return Credentials
     * @throws HuaweiException
     */
    public function getCredentials(HuaweiConfig $config): Credentials;

    /**
     * @param HuaweiConfig $config
     * @return void
     * @throws HuaweiException
     */
    public function invalidateCredentials(HuaweiConfig $config): void;
}
