<?php

namespace MegaKit\Huawei\PushKit\Auth;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use MegaKit\Huawei\PushKit\Config\OAuthConfig;
use MegaKit\Huawei\PushKit\Contracts\AuthProvider;
use MegaKit\Huawei\PushKit\Contracts\AuthStore;
use MegaKit\Huawei\PushKit\Contracts\HttpClient;
use MegaKit\Huawei\PushKit\Data\Auth\AccessToken;
use MegaKit\Huawei\PushKit\Data\Auth\Credentials;
use MegaKit\Huawei\PushKit\Data\Http\HttpRequest;
use MegaKit\Huawei\PushKit\Data\Http\HttpResponse;
use MegaKit\Huawei\PushKit\DataBuilder\Http\HttpRequestBuilder;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\HuaweiConfig;

class OAuthProvider implements AuthProvider
{
    /**
     * Default drop expires in value
     */
    private const DEFAULT_DROP_EXPIRES_IN = 60;

    /**
     * OAuth2 grant type
     */
    private const GRANT_TYPE = 'client_credentials';

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var AuthStore
     */
    private $store;

    /**
     * OAuthProvider constructor.
     * @param HttpClient $httpClient
     * @param AuthStore $store
     */
    public function __construct(HttpClient $httpClient, AuthStore $store)
    {
        $this->httpClient = $httpClient;
        $this->store = $store;
    }

    /**
     * @param HuaweiConfig $config
     * @return Credentials
     * @throws HuaweiException
     */
    public function getCredentials(HuaweiConfig $config): Credentials
    {
        $authConfig = $this->getOAuthConfig($config);
        $key = $authConfig->getClientId();

        $credentials = $this->store->getCredentials($key);

        if (! is_null($credentials)) {
            return $credentials;
        }

        $credentials = $this->requestNewAccessToken($config, $authConfig);

        $this->store->setCredentials($key, $credentials);

        return $credentials;
    }

    /**
     * @param HuaweiConfig $config
     * @param OAuthConfig $authConfig
     * @return AccessToken
     * @throws HuaweiException
     */
    protected function requestNewAccessToken(HuaweiConfig $config, OAuthConfig $authConfig): AccessToken
    {
        $request = HttpRequestBuilder::make()
            ->setMethod(HttpRequest::METHOD_POST)
            ->setUrl($config->getOAuthApiUrl())
            ->setBody([
                'grant_type' => self::GRANT_TYPE,
                'client_id' => $authConfig->getClientId(),
                'client_secret' => $authConfig->getClientSecret(),
            ])
            ->build();

        $response = $this->httpClient->sendRequest($request);

        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();

        if ($statusCode != HttpResponse::STATUS_CODE_OK) {
            throw new HuaweiException("Request failed [$statusCode]: $responseBody");
        }

        $response = json_decode($responseBody, true);

        if (! is_array($response)) {
            throw new HuaweiException("Invalid response: $responseBody");
        }

        if (! isset($response['token_type'], $response['access_token'], $response['expires_in'])) {
            throw new HuaweiException('Invalid oauth response');
        }

        $expiresIn = $persistExpiresIn = $response['expires_in'];

        $dropExpiresIn = $config->getIntAttribute('drop_expires_in', self::DEFAULT_DROP_EXPIRES_IN);

        if ($dropExpiresIn > 0) {
            // Minimize expired token errors by drop expiration time
            $persistExpiresIn -= $dropExpiresIn;
        }

        return new AccessToken(
            $response['token_type'],
            $response['access_token'],
            $expiresIn,
            $this->getExpiresAt($persistExpiresIn)
        );
    }

    /**
     * @param int $expiresIn
     * @return DateTimeInterface
     */
    private function getExpiresAt(int $expiresIn): DateTimeInterface
    {
        return (new DateTimeImmutable)->add(new DateInterval("PT{$expiresIn}S"));
    }

    /**
     * @param HuaweiConfig $config
     * @return void
     * @throws HuaweiException
     */
    public function invalidateCredentials(HuaweiConfig $config): void
    {
        $this->store->deleteCredentials($this->getOAuthConfig($config)->getClientId());
    }

    /**
     * @param HuaweiConfig $config
     * @return OAuthConfig
     * @throws HuaweiException
     */
    private function getOAuthConfig(HuaweiConfig $config): OAuthConfig
    {
        $authConfig = $config->getAuthConfig();

        if (! $authConfig instanceof OAuthConfig) {
            throw new HuaweiException('Unsupported auth config');
        }

        return $authConfig;
    }
}
