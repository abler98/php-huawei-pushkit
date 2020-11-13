<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Config\AuthConfig;

class HuaweiConfig
{
    /**
     * Default push api base url
     */
    const DEFAULT_PUSH_API_URL = 'https://push-api.cloud.huawei.com/v1';

    /**
     * Default OAuth login url
     */
    const DEFAULT_OAUTH_URL = 'https://oauth-login.cloud.huawei.com/oauth2/v3/token';

    /**
     * @var string
     */
    private $pushApiUrl;

    /**
     * @var string|null
     */
    private $oAuthApiUrl;

    /**
     * @var string
     */
    private $appId;

    /**
     * @var AuthConfig
     */
    private $authConfig;

    /**
     * @var array
     */
    private $attributes;

    /**
     * HuaweiConfig constructor.
     * @param string $pushApiUrl
     * @param string|null $oAuthApiUrl
     * @param string $appId
     * @param AuthConfig $authConfig
     * @param array $attributes
     * @internal
     */
    public function __construct(
        string $pushApiUrl,
        ?string $oAuthApiUrl,
        string $appId,
        AuthConfig $authConfig,
        array $attributes
    ) {
        $this->pushApiUrl = $pushApiUrl;
        $this->oAuthApiUrl = $oAuthApiUrl;
        $this->appId = $appId;
        $this->authConfig = $authConfig;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getPushApiUrl(): string
    {
        return $this->pushApiUrl;
    }

    /**
     * @return string|null
     */
    public function getOAuthApiUrl(): ?string
    {
        return $this->oAuthApiUrl;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return AuthConfig
     */
    public function getAuthConfig(): AuthConfig
    {
        return $this->authConfig;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param string $key
     * @param bool $default
     * @return bool
     */
    public function getBoolAttribute(string $key, bool $default): bool
    {
        return $this->attributes[$key] ?? $default;
    }

    /**
     * @param string $key
     * @param int|null $default
     * @return int|null
     */
    public function getIntAttribute(string $key, ?int $default = null): ?int
    {
        return $this->attributes[$key] ?? $default;
    }
}
