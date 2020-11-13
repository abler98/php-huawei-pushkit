<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Contracts\AuthProvider;
use MegaKit\Huawei\PushKit\Contracts\Client;
use MegaKit\Huawei\PushKit\Contracts\HttpClient;
use MegaKit\Huawei\PushKit\Data\Auth\AccessToken;
use MegaKit\Huawei\PushKit\Data\Auth\ApiKey;
use MegaKit\Huawei\PushKit\Data\Destination\Destination;
use MegaKit\Huawei\PushKit\Data\Http\HttpRequest;
use MegaKit\Huawei\PushKit\Data\Http\HttpResponse;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\Response;
use MegaKit\Huawei\PushKit\DataBuilder\Http\HttpRequestBuilder;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiAuthException;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;

class DefaultClient implements Client
{
    /**
     * Number of retries on authorization failure
     */
    private const DEFAULT_AUTH_RETRY_LIMIT = 1;

    /**
     * Send message method name
     */
    private const METHOD_MESSAGES_SEND = 'messages:send';

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var AuthProvider
     */
    private $authProvider;

    /**
     * DefaultClient constructor.
     * @param HttpClient $httpClient
     * @param AuthProvider $authProvider
     */
    public function __construct(HttpClient $httpClient, AuthProvider $authProvider)
    {
        $this->httpClient = $httpClient;
        $this->authProvider = $authProvider;
    }

    /**
     * @param HuaweiConfig $config
     * @param Message $message
     * @param Destination $destination
     * @return Response
     * @throws HuaweiException
     */
    public function sendMessage(HuaweiConfig $config, Message $message, Destination $destination): Response
    {
        $authRetriesLeft = $config->getIntAttribute('auth_retry_limit', self::DEFAULT_AUTH_RETRY_LIMIT);

        while (true) {
            try {
                return $this->sendMessageInternal($config, $message, $destination);
            } catch (HuaweiAuthException $e) {
                if (--$authRetriesLeft < 0) {
                    throw $e;
                }
            }
        }
    }

    /**
     * @param HuaweiConfig $config
     * @param Message $message
     * @param Destination $destination
     * @return Response
     * @throws HuaweiAuthException
     * @throws HuaweiException
     */
    private function sendMessageInternal(HuaweiConfig $config, Message $message, Destination $destination): Response
    {
        $credentials = $this->authProvider->getCredentials($config);

        $queryParams = [];

        $headers = [
            'Accept' => 'application/json',
        ];

        if ($credentials instanceof ApiKey) {
            $queryParams['key'] = $credentials->getApiKey();
        } else if ($credentials instanceof AccessToken) {
            $headers['Authorization'] = $credentials->getAuthorizationHeader();
        } else {
            throw new HuaweiException('Unsupported auth credentials');
        }

        $body = [
            'validate_only' => $config->getBoolAttribute('validate_only', false),
            'message' => $this->omitNullValues(array_merge($message->toRequestBody(), $destination->toRequestBody())),
        ];

        $request = HttpRequestBuilder::make()
            ->setMethod(HttpRequest::METHOD_POST)
            ->setUrl($this->buildUri($config, self::METHOD_MESSAGES_SEND))
            ->setHeaders($headers)
            ->setQuery($queryParams)
            ->setJson($body)
            ->build();

        $response = $this->httpClient->sendRequest($request);

        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();

        if ($statusCode == HttpResponse::STATUS_CODE_UNAUTHORIZED) {
            $this->authProvider->invalidateCredentials($config);
            throw new HuaweiAuthException('Authentication failed');
        }

        if ($statusCode != HttpResponse::STATUS_CODE_OK) {
            throw new HuaweiException("Request failed [$statusCode]: $responseBody", $statusCode);
        }

        $response = json_decode($responseBody, true);

        if (! is_array($response) || ! isset($response['code'])) {
            throw new HuaweiException("Invalid response: $responseBody");
        }

        $authErrorCodes = [
            Response::CODE_OAUTH_AUTHENTICATION_ERROR,
            Response::CODE_OAUTH_TOKEN_EXPIRED,
        ];

        $responseMessage = $response['msg'] ?? 'No message';

        if (in_array($response['code'], $authErrorCodes)) {
            $this->authProvider->invalidateCredentials($config);
            throw new HuaweiAuthException("Authentication failed: $responseMessage", $response['code']);
        }

        return new Response(
            $response['requestId'] ?? '',
            $response['code'],
            $responseMessage
        );
    }

    /**
     * @param array $array
     * @return array
     */
    protected function omitNullValues(array $array): array
    {
        return array_filter(array_map(function ($element) {
            if (is_array($element)) {
                $element = $this->omitNullValues($element);
                return empty($element) ? null : $element;
            } else {
                return $element;
            }
        }, $array), function ($element) {
            return $element !== null;
        });
    }

    /**
     * @param HuaweiConfig $config
     * @param string $method
     * @return string
     */
    protected function buildUri(HuaweiConfig $config, string $method): string
    {
        return sprintf('%s/%s/%s', $config->getPushApiUrl(), $config->getAppId(), $method);
    }
}
