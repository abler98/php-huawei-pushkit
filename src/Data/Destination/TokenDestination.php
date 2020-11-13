<?php

namespace MegaKit\Huawei\PushKit\Data\Destination;

class TokenDestination extends Destination
{
    /**
     * @var string[]
     */
    private $tokens;

    /**
     * TokenDestination constructor.
     * @param string[] $tokens
     */
    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param string $token
     * @return static
     */
    public static function single(string $token): self
    {
        return new static([$token]);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->tokens);
    }

    /**
     * @return string[]
     */
    public function getTokens(): array
    {
        return $this->tokens;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'token' => $this->tokens,
        ];
    }
}
