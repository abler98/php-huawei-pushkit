<?php

namespace MegaKit\Huawei\PushKit\Config;

class ApiKeyConfig extends AuthConfig
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * ApiKeyAuthConfig constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
