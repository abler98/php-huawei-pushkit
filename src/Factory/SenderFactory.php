<?php

namespace MegaKit\Huawei\PushKit\Factory;

use MegaKit\Huawei\PushKit\Auth\ApiKeyProvider;
use MegaKit\Huawei\PushKit\Auth\DefaultAuthProvider;
use MegaKit\Huawei\PushKit\Auth\InMemoryAuthStore;
use MegaKit\Huawei\PushKit\Auth\OAuthProvider;
use MegaKit\Huawei\PushKit\Contracts\AuthProvider;
use MegaKit\Huawei\PushKit\Contracts\AuthStore;
use MegaKit\Huawei\PushKit\Contracts\Client;
use MegaKit\Huawei\PushKit\Contracts\HttpClient;
use MegaKit\Huawei\PushKit\Contracts\Sender as SenderInterface;
use MegaKit\Huawei\PushKit\Contracts\StatefulSender as StatefulSenderInterface;
use MegaKit\Huawei\PushKit\CurlHttpClient;
use MegaKit\Huawei\PushKit\DefaultClient;
use MegaKit\Huawei\PushKit\HttpConfig;
use MegaKit\Huawei\PushKit\HuaweiConfig;
use MegaKit\Huawei\PushKit\Sender;
use MegaKit\Huawei\PushKit\StatefulSender;

class SenderFactory
{
    /**
     * @param HttpConfig $httpConfig
     * @return SenderInterface
     */
    public function createSender(HttpConfig $httpConfig): SenderInterface
    {
        $httpClient = $this->createHttpClient($httpConfig);
        $authStore = $this->createAuthStore();
        $authProvider = $this->createAuthProvider($httpClient, $authStore);
        $client = $this->createClient($httpClient, $authProvider);

        return new Sender($client);
    }

    /**
     * @param HuaweiConfig $config
     * @param HttpConfig $httpConfig
     * @return StatefulSenderInterface
     */
    public function createSenderWithConfig(HuaweiConfig $config, HttpConfig $httpConfig): StatefulSenderInterface
    {
        return new StatefulSender($this->createSender($httpConfig), $config);
    }

    /**
     * @param HttpClient $httpClient
     * @param AuthProvider $authProvider
     * @return Client
     */
    protected function createClient(HttpClient $httpClient, AuthProvider $authProvider): Client
    {
        return new DefaultClient($httpClient, $authProvider);
    }

    /**
     * @param HttpClient $httpClient
     * @param AuthStore $authStore
     * @return AuthProvider
     */
    protected function createAuthProvider(HttpClient $httpClient, AuthStore $authStore): AuthProvider
    {
        return new DefaultAuthProvider(
            $this->createApiKeyProvider(),
            $this->createOAuthProvider($httpClient, $authStore)
        );
    }

    /**
     * @return ApiKeyProvider
     */
    protected function createApiKeyProvider(): ApiKeyProvider
    {
        return new ApiKeyProvider();
    }

    /**
     * @param HttpClient $httpClient
     * @param AuthStore $authStore
     * @return OAuthProvider
     */
    protected function createOAuthProvider(HttpClient $httpClient, AuthStore $authStore): OAuthProvider
    {
        return new OAuthProvider($httpClient, $authStore);
    }

    /**
     * @return AuthStore
     */
    protected function createAuthStore(): AuthStore
    {
        return new InMemoryAuthStore();
    }

    /**
     * @param HttpConfig $httpConfig
     * @return HttpClient
     */
    protected function createHttpClient(HttpConfig $httpConfig): HttpClient
    {
        return new CurlHttpClient($httpConfig);
    }
}
