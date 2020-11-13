<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Contracts\Sender as SenderInterface;
use MegaKit\Huawei\PushKit\Contracts\StatefulSender as StatefulSenderInterface;
use MegaKit\Huawei\PushKit\Data\Destination\Destination;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\SendResult;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;

class StatefulSender implements StatefulSenderInterface
{
    /**
     * @var SenderInterface
     */
    private $sender;

    /**
     * @var HuaweiConfig
     */
    private $config;

    /**
     * StatefulSender constructor.
     * @param SenderInterface $sender
     * @param HuaweiConfig $config
     */
    public function __construct(SenderInterface $sender, HuaweiConfig $config)
    {
        $this->sender = $sender;
        $this->config = $config;
    }

    /**
     * @param Message $message
     * @param Destination $destination
     * @return SendResult
     * @throws HuaweiException
     */
    public function sendMessage(Message $message, Destination $destination): SendResult
    {
        return $this->sender->sendMessage($this->config, $message, $destination);
    }
}
