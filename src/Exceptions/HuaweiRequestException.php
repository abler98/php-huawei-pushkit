<?php

namespace MegaKit\Huawei\PushKit\Exceptions;

class HuaweiRequestException extends HuaweiException
{
    /**
     * @var string
     */
    private $requestId;

    /**
     * HuaweiRequestException constructor.
     * @param string $requestId
     * @param string $message
     * @param int $code
     */
    public function __construct(string $requestId, string $message, int $code)
    {
        parent::__construct($message, $code);

        $this->requestId = $requestId;
    }
}
