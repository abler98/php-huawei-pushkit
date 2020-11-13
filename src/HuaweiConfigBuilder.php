<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Config\ApiKeyConfig;
use MegaKit\Huawei\PushKit\Config\AuthConfig;
use MegaKit\Huawei\PushKit\Config\OAuthConfig;
use Webmozart\Assert\Assert;

class HuaweiConfigBuilder
{
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
    private $attributes = [];

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @return static
     */
    public static function withDefaults(): self
    {
        return static::make()
            ->setPushApiUrl(HuaweiConfig::DEFAULT_PUSH_API_URL)
            ->setOAuthApiUrl(HuaweiConfig::DEFAULT_OAUTH_URL);
    }

    /**
     * @param string $pushApiUrl
     * @return static
     */
    public function setPushApiUrl(string $pushApiUrl): self
    {
        $this->pushApiUrl = $pushApiUrl;

        return $this;
    }

    /**
     * @param string|null $oAuthApiUrl
     * @return static
     */
    public function setOAuthApiUrl(?string $oAuthApiUrl): self
    {
        $this->oAuthApiUrl = $oAuthApiUrl;

        return $this;
    }

    /**
     * @param string $appId
     * @return static
     */
    public function setAppId(string $appId): self
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * @param AuthConfig $authConfig
     * @return static
     */
    public function setAuthConfig(AuthConfig $authConfig): self
    {
        $this->authConfig = $authConfig;

        return $this;
    }

    /**
     * @param string $apiKey
     * @return static
     */
    public function setApiKey(string $apiKey): self
    {
        $this->authConfig = new ApiKeyConfig($apiKey);

        return $this;
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @return static
     */
    public function setOAuthCredentials(string $clientId, string $clientSecret): self
    {
        $this->authConfig = new OAuthConfig($clientId, $clientSecret);

        return $this;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return HuaweiConfig
     */
    public function build(): HuaweiConfig
    {
        Assert::notNull($this->pushApiUrl);
        Assert::notNull($this->appId);
        Assert::notNull($this->authConfig);

        if ($this->authConfig instanceof OAuthConfig) {
            Assert::notNull($this->oAuthApiUrl);
        }

        return new HuaweiConfig(
            $this->pushApiUrl,
            $this->oAuthApiUrl,
            $this->appId,
            $this->authConfig,
            $this->attributes
        );
    }
}
