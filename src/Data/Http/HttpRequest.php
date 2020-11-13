<?php

namespace MegaKit\Huawei\PushKit\Data\Http;

class HttpRequest
{
    /**
     * Get request method
     */
    const METHOD_GET = 'get';

    /**
     * Post request method
     */
    const METHOD_POST = 'post';

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array|null
     */
    private $headers;

    /**
     * @var array|null
     */
    private $query;

    /**
     * @var array|null
     */
    private $body;

    /**
     * @var array|null
     */
    private $json;

    /**
     * HttpRequest constructor.
     * @param string $method
     * @param string $url
     * @param array|null $headers
     * @param array|null $query
     * @param array|null $body
     * @param array|null $json
     */
    public function __construct(string $method, string $url, ?array $headers, ?array $query, ?array $body, ?array $json)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->query = $query;
        $this->body = $body;
        $this->json = $json;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @return array|null
     */
    public function getQuery(): ?array
    {
        return $this->query;
    }

    /**
     * @return array|null
     */
    public function getBody(): ?array
    {
        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getJson(): ?array
    {
        return $this->json;
    }
}
