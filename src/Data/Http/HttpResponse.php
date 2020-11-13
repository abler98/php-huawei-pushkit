<?php

namespace MegaKit\Huawei\PushKit\Data\Http;

class HttpResponse
{
    /**
     * 200 Ok
     */
    const STATUS_CODE_OK = 200;

    /**
     * 401 Unauthorized
     */
    const STATUS_CODE_UNAUTHORIZED = 401;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string|null
     */
    private $body;

    /**
     * HttpResponse constructor.
     * @param int $statusCode
     * @param string|null $body
     */
    public function __construct(int $statusCode, ?string $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
}
