<?php

namespace MegaKit\Huawei\PushKit\Contracts;

use MegaKit\Huawei\PushKit\Data\Destination\Destination;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\SendResult;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;

interface StatefulSender
{
    /**
     * @param Message $message
     * @param Destination $destination
     * @return SendResult
     * @throws HuaweiException
     */
    public function sendMessage(Message $message, Destination $destination): SendResult;
}
