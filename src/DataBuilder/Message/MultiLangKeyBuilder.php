<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message;

use MegaKit\Huawei\PushKit\Data\Message\MultiLangKey;
use MegaKit\Huawei\PushKit\Data\Message\MultiLangKeyItem;
use Webmozart\Assert\Assert;

class MultiLangKeyBuilder
{
    /**
     * @var MultiLangKeyItem[]
     */
    private $titleKey = [];

    /**
     * @var MultiLangKeyItem[]
     */
    private $bodyKey = [];

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param MultiLangKeyItem[] $titleKey
     * @return static
     */
    public function setTitleKey(array $titleKey): self
    {
        Assert::allIsInstanceOf($titleKey, MultiLangKeyItem::class);

        $this->titleKey = $titleKey;

        return $this;
    }

    /**
     * @param MultiLangKeyItem[] $bodyKey
     * @return static
     */
    public function setBodyKey(array $bodyKey): self
    {
        Assert::allIsInstanceOf($bodyKey, MultiLangKeyItem::class);

        $this->bodyKey = $bodyKey;

        return $this;
    }

    /**
     * @return MultiLangKey
     */
    public function build(): MultiLangKey
    {
        return new MultiLangKey(
            $this->titleKey,
            $this->bodyKey
        );
    }
}
