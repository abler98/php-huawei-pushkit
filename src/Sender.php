<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Contracts\Client;
use MegaKit\Huawei\PushKit\Contracts\Sender as SenderInterface;
use MegaKit\Huawei\PushKit\Data\Destination\Destination;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\Response;
use MegaKit\Huawei\PushKit\Data\SendResult;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;

class Sender implements SenderInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Sender constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param HuaweiConfig $config
     * @param Message $message
     * @param Destination $destination
     * @return SendResult
     * @throws HuaweiException
     */
    public function sendMessage(HuaweiConfig $config, Message $message, Destination $destination): SendResult
    {
        $response = $this->client->sendMessage($config, $message, $destination);

        switch ($response->getCode()) {
            case Response::CODE_SUCCESS:
                return SendResult::success();
            case Response::CODE_HAS_FAILURES:
                return SendResult::withFailures($response->getMessageAsFailures());
            default:
                throw $response->asError();
        }
    }
}
