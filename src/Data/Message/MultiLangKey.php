<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class MultiLangKey implements RequestBodySerializable
{
    /**
     * @var MultiLangKeyItem[]
     */
    private $titleKey;

    /**
     * @var MultiLangKeyItem[]
     */
    private $bodyKey;

    /**
     * MultiLangKey constructor.
     * @param MultiLangKeyItem[] $titleKey
     * @param MultiLangKeyItem[] $bodyKey
     * @internal
     */
    public function __construct(array $titleKey, array $bodyKey)
    {
        $this->titleKey = $titleKey;
        $this->bodyKey = $bodyKey;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'title_key' => [],
            'body_key' => [],
        ];

        foreach ($this->titleKey as $item) {
            $body['title_key'][$item->getLang()] = $item->getValue();
        }

        foreach ($this->bodyKey as $item) {
            $body['body_key'][$item->getLang()] = $item->getValue();
        }

        return $body;
    }
}
