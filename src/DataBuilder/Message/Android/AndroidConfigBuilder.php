<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidConfig;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidNotification;
use Webmozart\Assert\Assert;

class AndroidConfigBuilder
{
    /**
     * @var int|null
     */
    private $collapseKey;

    /**
     * @var string|null
     */
    private $urgency;

    /**
     * @var string|null
     */
    private $category;

    /**
     * @var int|null
     */
    private $ttl;

    /**
     * @var string|null
     */
    private $biTag;

    /**
     * @var int|null
     */
    private $fastAppTarget;

    /**
     * @var array|null
     */
    private $data;

    /**
     * @var AndroidNotification|null
     */
    private $notification;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param int|null $collapseKey
     * @return static
     */
    public function setCollapseKey(?int $collapseKey): self
    {
        $this->collapseKey = $collapseKey;

        return $this;
    }

    /**
     * @param string|null $urgency
     * @return static
     */
    public function setUrgency(?string $urgency): self
    {
        Assert::nullOrInArray($urgency, [
            AndroidConfig::URGENCY_HIGH,
            AndroidConfig::URGENCY_NORMAL,
        ]);

        $this->urgency = $urgency;

        return $this;
    }

    /**
     * @param string|null $category
     * @return static
     */
    public function setCategory(?string $category): self
    {
        Assert::nullOrInArray($category, [
            AndroidConfig::CATEGORY_PLAY_VOICE,
            AndroidConfig::CATEGORY_VOIP,
        ]);

        $this->category = $category;

        return $this;
    }

    /**
     * @param int|null $ttl
     * @return static
     */
    public function setTtl(?int $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @param string|null $biTag
     * @return static
     */
    public function setBiTag(?string $biTag): self
    {
        $this->biTag = $biTag;

        return $this;
    }

    /**
     * @param int|null $fastAppTarget
     * @return static
     */
    public function setFastAppTarget(?int $fastAppTarget): self
    {
        Assert::nullOrInArray($fastAppTarget, [
            AndroidConfig::FAST_APP_TARGET_DEVELOPMENT,
            AndroidConfig::FAST_APP_TARGET_PRODUCTION,
        ]);

        $this->fastAppTarget = $fastAppTarget;

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
     * @param AndroidNotification|null $notification
     * @return static
     */
    public function setNotification(?AndroidNotification $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return AndroidConfig
     */
    public function build(): AndroidConfig
    {
        return new AndroidConfig(
            $this->collapseKey,
            $this->urgency,
            $this->category,
            $this->ttl,
            $this->biTag,
            $this->fastAppTarget,
            $this->data,
            $this->notification
        );
    }
}
