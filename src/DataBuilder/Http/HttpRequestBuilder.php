<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Http;

use MegaKit\Huawei\PushKit\Data\Http\HttpRequest;
use Webmozart\Assert\Assert;

class HttpRequestBuilder
{
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string $method
     * @return static
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param array|null $headers
     * @return static
     */
    public function setHeaders(?array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param array|null $query
     * @return static
     */
    public function setQuery(?array $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @param array|null $body
     * @return static
     */
    public function setBody(?array $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param array|null $json
     * @return static
     */
    public function setJson(?array $json): self
    {
        $this->json = $json;

        return $this;
    }

    /**
     * @return HttpRequest
     */
    public function build(): HttpRequest
    {
        Assert::notNull($this->method);
        Assert::notNull($this->url);

        return new HttpRequest(
            $this->method,
            $this->url,
            $this->headers,
            $this->query,
            $this->body,
            $this->json
        );
    }
}
