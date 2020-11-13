<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message;

use MegaKit\Huawei\PushKit\Data\Message\Notification;
use Webmozart\Assert\Assert;

class NotificationBuilder
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string|null
     */
    private $image;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $body
     * @return static
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string|null $image
     * @return static
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Notification
     */
    public function build(): Notification
    {
        Assert::notNull($this->title);
        Assert::notNull($this->body);

        return new Notification(
            $this->title,
            $this->body,
            $this->image
        );
    }
}
