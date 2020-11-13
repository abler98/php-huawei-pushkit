<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class Notification implements RequestBodySerializable
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
     * Notification constructor.
     * @param string $title
     * @param string $body
     * @param string|null $image
     * @internal
     */
    public function __construct(string $title, string $body, ?string $image)
    {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
        ];
    }
}
