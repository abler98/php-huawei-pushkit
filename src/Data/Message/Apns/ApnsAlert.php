<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Apns;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class ApnsAlert implements RequestBodySerializable
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
    private $titleLocKey;

    /**
     * @var array|null
     */
    private $titleLocArgs;

    /**
     * @var string|null
     */
    private $actionLocKey;

    /**
     * @var string|null
     */
    private $locKey;

    /**
     * @var array|null
     */
    private $locArgs;

    /**
     * @var string|null
     */
    private $launchImage;

    /**
     * ApnsAlert constructor.
     * @param string $title
     * @param string $body
     * @param string|null $titleLocKey
     * @param array|null $titleLocArgs
     * @param string|null $actionLocKey
     * @param string|null $locKey
     * @param array|null $locArgs
     * @param string|null $launchImage
     * @internal
     */
    public function __construct(
        string $title,
        string $body,
        ?string $titleLocKey,
        ?array $titleLocArgs,
        ?string $actionLocKey,
        ?string $locKey,
        ?array $locArgs,
        ?string $launchImage
    ) {
        $this->title = $title;
        $this->body = $body;
        $this->titleLocKey = $titleLocKey;
        $this->titleLocArgs = $titleLocArgs;
        $this->actionLocKey = $actionLocKey;
        $this->locKey = $locKey;
        $this->locArgs = $locArgs;
        $this->launchImage = $launchImage;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'title-loc-key' => $this->titleLocArgs,
            'title-loc-args' => $this->titleLocArgs,
            'action-loc-key' => $this->actionLocKey,
            'loc-key' => $this->locKey,
            'loc-args' => $this->locArgs,
            'launch-image' => $this->launchImage,
        ];
    }
}
