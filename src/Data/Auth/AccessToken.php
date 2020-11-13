<?php

namespace MegaKit\Huawei\PushKit\Data\Auth;

use DateTime;
use DateTimeInterface;

class AccessToken extends PersistableCredentials
{
    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var int
     */
    private $expiresIn;

    /**
     * @var DateTime
     */
    private $expiresAt;

    /**
     * AccessToken constructor.
     * @param string $tokenType
     * @param string $accessToken
     * @param int $expiresIn
     * @param DateTimeInterface $expiresAt
     */
    public function __construct(string $tokenType, string $accessToken, int $expiresIn, DateTimeInterface $expiresAt)
    {
        $this->tokenType = $tokenType;
        $this->accessToken = $accessToken;
        $this->expiresIn = $expiresIn;
        $this->expiresAt = $expiresAt;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @return DateTimeInterface
     */
    public function getExpiresAt(): DateTimeInterface
    {
        return $this->expiresAt;
    }

    /**
     * @return string
     */
    public function getAuthorizationHeader(): string
    {
        return $this->tokenType . ' ' . $this->accessToken;
    }
}
