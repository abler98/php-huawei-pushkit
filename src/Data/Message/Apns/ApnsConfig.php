<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Apns;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class ApnsConfig implements RequestBodySerializable
{
    /**
     * @var ApnsHeaders|null
     */
    private $headers;

    /**
     * @var ApnsHmsOptions
     */
    private $hmsOptions;

    /**
     * @var ApnsNotification|null
     */
    private $notification;

    /**
     * @var array|null
     */
    private $data;

    /**
     * ApnsConfig constructor.
     * @param ApnsHeaders|null $headers
     * @param ApnsHmsOptions $hmsOptions
     * @param ApnsNotification|null $notification
     * @param array|null $data
     */
    public function __construct(
        ?ApnsHeaders $headers,
        ApnsHmsOptions $hmsOptions,
        ?ApnsNotification $notification,
        ?array $data
    ) {
        $this->headers = $headers;
        $this->hmsOptions = $hmsOptions;
        $this->notification = $notification;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'hms_options' => $this->hmsOptions->toRequestBody(),
        ];

        if ($this->headers !== null) {
            $body['headers'] = $this->headers->toRequestBody();
        }

        if ($this->data !== null) {
            $body['payload'] = $this->data;
        } else {
            $body['payload'] = [];
        }

        if ($this->notification !== null) {
            $body['payload'] = array_merge($body['payload'], $this->notification->toRequestBody());
        }

        return $body;
    }
}
