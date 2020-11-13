<?php

namespace MegaKit\Huawei\PushKit\Data\Auth;

class ApiKey extends Credentials
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * ApiKey constructor.
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
