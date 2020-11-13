<?php

namespace MegaKit\Huawei\PushKit\Contracts;

use MegaKit\Huawei\PushKit\Data\Destination\Destination;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\Response;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiException;
use MegaKit\Huawei\PushKit\HuaweiConfig;

interface Client
{
    /**
     * @param HuaweiConfig $config
     * @param Message $message
     * @param Destination $destination
     * @return Response
     * @throws HuaweiException
     */
    public function sendMessage(HuaweiConfig $config, Message $message, Destination $destination): Response;
}
