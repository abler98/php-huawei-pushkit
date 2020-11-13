<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Apns;

use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsConfig;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsHeaders;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsHmsOptions;
use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsNotification;
use Webmozart\Assert\Assert;

class ApnsConfigBuilder
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param ApnsHeaders|null $headers
     * @return static
     */
    public function setHeaders(?ApnsHeaders $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param ApnsHmsOptions $hmsOptions
     * @return static
     */
    public function setHmsOptions(ApnsHmsOptions $hmsOptions): self
    {
        $this->hmsOptions = $hmsOptions;

        return $this;
    }


    /**
     * @param ApnsNotification|null $notification
     * @return static
     */
    public function setNotification(?ApnsNotification $notification): self
    {
        $this->notification = $notification;

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
     * @return ApnsConfig
     */
    public function build(): ApnsConfig
    {
        Assert::notNull($this->hmsOptions);

        return new ApnsConfig(
            $this->headers,
            $this->hmsOptions,
            $this->notification,
            $this->data
        );
    }
}
