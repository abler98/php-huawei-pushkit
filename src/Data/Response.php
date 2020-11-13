<?php

namespace MegaKit\Huawei\PushKit\Data;

use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiRequestException;

class Response
{
    /**
     * Success
     */
    const CODE_SUCCESS = '80000000';

    /**
     * Some tokens are successfully sent. Tokens identified by illegal_token are those failed to be sent.
     */
    const CODE_HAS_FAILURES = '80100000';

    /**
     * OAuth authentication error.
     */
    const CODE_OAUTH_AUTHENTICATION_ERROR = '80200001';

    /**
     * OAuth token expired.
     */
    const CODE_OAUTH_TOKEN_EXPIRED = '80200003';

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * Response constructor.
     * @param string $requestId
     * @param string $code
     * @param string $message
     */
    public function __construct(string $requestId, string $code, string $message)
    {
        $this->requestId = $requestId;
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return FailuresResponse
     * @throws HuaweiException
     */
    public function getMessageAsFailures(): FailuresResponse
    {
        $data = json_decode($this->message, true);

        if (! is_array($data)) {
            throw new HuaweiException('Invalid response message payload');
        }

        if (! isset($data['success'], $data['failure'], $data['illegal_tokens'])) {
            throw new HuaweiException('Invalid response message payload');
        }

        return new FailuresResponse($data['success'], $data['failure'], $data['illegal_tokens']);
    }

    /**
     * @return HuaweiException
     */
    public function asError(): HuaweiException
    {
        return new HuaweiRequestException(
            $this->getRequestId(),
            $this->getMessage(),
            (int) $this->getCode()
        );
    }
}
