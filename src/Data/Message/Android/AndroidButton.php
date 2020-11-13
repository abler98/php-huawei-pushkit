<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class AndroidButton implements RequestBodySerializable
{
    /**
     * Open the app home page
     */
    const ACTION_TYPE_HOME_PAGE = 0;

    /**
     * Open a custom app page
     */
    const ACTION_TYPE_CUSTOM_PAGE = 1;

    /**
     * Open a specified web page
     */
    const ACTION_TYPE_WEB_PAGE = 2;

    /**
     * Delete a notification message
     */
    const ACTION_TYPE_DELETE = 3;

    /**
     * Share a notification message
     */
    const ACTION_TYPE_SHARE = 4;

    /**
     * Open the page through intent
     */
    const INTENT_TYPE_INTENT = 0;

    /**
     * Open the page through action
     */
    const INTENT_TYPE_ACTION = 1;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $actionType;

    /**
     * @var int|null
     */
    private $intentType;

    /**
     * @var string|null
     */
    private $intent;

    /**
     * @var array|null
     */
    private $data;

    /**
     * AndroidButton constructor.
     * @param string $name
     * @param int $actionType
     * @param int|null $intentType
     * @param string|null $intent
     * @param array|null $data
     * @internal
     */
    public function __construct(string $name, int $actionType, ?int $intentType, ?string $intent, ?array $data)
    {
        $this->name = $name;
        $this->actionType = $actionType;
        $this->intentType = $intentType;
        $this->intent = $intent;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'name' => $this->name,
            'action_type' => $this->actionType,
            'intent_type' => $this->intentType,
            'intent' => $this->intent,
        ];

        if ($this->data !== null) {
            $body['data'] = json_encode($this->data);
        }

        return $body;
    }
}
