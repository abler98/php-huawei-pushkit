<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class AndroidClickAction implements RequestBodySerializable
{
    /**
     * Tap to open a custom app page
     */
    const TYPE_APP_PAGE = 1;

    /**
     * Tap to open a specified URL
     */
    const TYPE_URL = 2;

    /**
     * Tap to start the app
     */
    const TYPE_START_APP = 3;

    /**
     * Default action
     */
    const ACTION_NONE = 'android';

    /**
     * @var int
     */
    private $type;

    /**
     * @var string|null
     */
    private $intent;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $action;

    /**
     * AndroidClickAction constructor.
     * @param int $type
     * @param string|null $intent
     * @param string|null $url
     * @param string|null $action
     * @internal
     */
    public function __construct(int $type, ?string $intent, ?string $url, ?string $action)
    {
        $this->type = $type;
        $this->intent = $intent;
        $this->url = $url;
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'type' => $this->type,
            'intent' => $this->intent,
            'url' => $this->url,
            'action' => $this->action,
        ];
    }
}
