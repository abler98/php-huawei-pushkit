<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidConfig;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsConfig;
use MegaKit\Huawei\PushKit\Data\Message\Message;
use MegaKit\Huawei\PushKit\Data\Message\Notification;

class MessageBuilder
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param Notification|null $notification
     * @return static
     */
    public function setNotification(?Notification $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @param AndroidConfig|null $android
     * @return static
     */
    public function setAndroid(?AndroidConfig $android): self
    {
        $this->android = $android;

        return $this;
    }

    /**
     * @param ApnsConfig|null $apns
     * @return static
     */
    public function setApns(?ApnsConfig $apns): self
    {
        $this->apns = $apns;

        return $this;
    }

    /**
     * @param array|null $data
     * @return static
     */
    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public function addData(array $data): self
    {
        $this->data = $this->data ?: [];

        $this->data = array_merge($data, $this->data);

        return $this;
    }

    /**
     * @return Message
     */
    public function build(): Message
    {
        return new Message(
            $this->notification,
            $this->android,
            $this->apns,
            $this->data
        );
    }
}
