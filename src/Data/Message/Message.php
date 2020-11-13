<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidConfig;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsConfig;

class Message implements RequestBodySerializable
{
    /**
     * @var Notification|null
     */
    private $notification;

    /**
     * @var AndroidConfig|null
     */
    private $android;

    /**
     * @var ApnsConfig|null
     */
    private $apns;

    /**
     * @var array|null
     */
    private $data;

    /**
     * Message constructor.
     * @param Notification|null $notification
     * @param AndroidConfig|null $android
     * @param ApnsConfig|null $apns
     * @param array|null $data
     * @internal
     */
    public function __construct(?Notification $notification, ?AndroidConfig $android, ?ApnsConfig $apns, ?array $data)
    {
        $this->notification = $notification;
        $this->android = $android;
        $this->apns = $apns;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [];

        if ($this->data !== null) {
            $body['data'] = json_encode($this->data);
        }

        if ($this->notification !== null) {
            $body['notification'] = $this->notification->toRequestBody();
        }

        if ($this->android !== null) {
            $body['android'] = $this->android->toRequestBody();
        }

        if ($this->apns !== null) {
            $body['apns'] = $this->apns->toRequestBody();
        }

        return $body;
    }
}
