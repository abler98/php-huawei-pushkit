<?php

namespace MegaKit\Huawei\PushKit\Auth;

use MegaKit\Huawei\PushKit\Config\ApiKeyConfig;
use MegaKit\Huawei\PushKit\Config\OAuthConfig;
use MegaKit\Huawei\PushKit\Contracts\AuthProvider;
use MegaKit\Huawei\PushKit\Data\Auth\Credentials;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\HuaweiConfig;

class DefaultAuthProvider implements AuthProvider
{
    /**
     * @var ApiKeyProvider
     */
    private $apiKeyProvider;

    /**
     * @var OAuthProvider
     */
    private $oAuthProvider;

    /**
     * DefaultAuthProvider constructor.
     * @param ApiKeyProvider $apiKeyProvider
     * @param OAuthProvider $oAuthProvider
     */
    public function __construct(ApiKeyProvider $apiKeyProvider, OAuthProvider $oAuthProvider)
    {
        $this->apiKeyProvider = $apiKeyProvider;
        $this->oAuthProvider = $oAuthProvider;
    }

    /**
     * @param HuaweiConfig $config
     * @return Credentials
     * @throws HuaweiException
     */
    public function getCredentials(HuaweiConfig $config): Credentials
    {
        return $this->getProvider($config)->getCredentials($config);
    }

    /**
     * @param HuaweiConfig $config
     * @return void
     * @throws HuaweiException
     */
    public function invalidateCredentials(HuaweiConfig $config): void
    {
        $this->getProvider($config)->invalidateCredentials($config);
    }

    /**
     * @param HuaweiConfig $config
     * @return AuthProvider
     * @throws HuaweiException
     */
    private function getProvider(HuaweiConfig $config): AuthProvider
    {
        $authConfig = $config->getAuthConfig();

        if ($authConfig instanceof ApiKeyConfig) {
            return $this->apiKeyProvider;
        } else if ($authConfig instanceof OAuthConfig) {
            return $this->oAuthProvider;
        }

        throw new HuaweiException('Unsupported auth config');
    }
}
