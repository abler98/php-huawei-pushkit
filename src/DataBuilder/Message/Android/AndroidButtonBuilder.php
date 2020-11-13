<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidButton;
use Webmozart\Assert\Assert;

class AndroidButtonBuilder
{
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int $actionType
     * @return static
     */
    public function setActionType(int $actionType): self
    {
        Assert::inArray($actionType, [
            AndroidButton::ACTION_TYPE_HOME_PAGE,
            AndroidButton::ACTION_TYPE_CUSTOM_PAGE,
            AndroidButton::ACTION_TYPE_WEB_PAGE,
            AndroidButton::ACTION_TYPE_DELETE,
            AndroidButton::ACTION_TYPE_SHARE,
            AndroidButton::ACTION_TYPE_SHARE,
        ]);

        $this->actionType = $actionType;

        return $this;
    }

    /**
     * @param int|null $intentType
     * @return static
     */
    public function setIntentType(?int $intentType): self
    {
        Assert::nullOrInArray($intentType, [
            AndroidButton::INTENT_TYPE_INTENT,
            AndroidButton::INTENT_TYPE_ACTION,
        ]);

        $this->intentType = $intentType;

        return $this;
    }

    /**
     * @param string|null $intent
     * @return static
     */
    public function setIntent(?string $intent): self
    {
        $this->intent = $intent;

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
     * @return AndroidButton
     */
    public function build(): AndroidButton
    {
        Assert::notNull($this->name);
        Assert::notNull($this->actionType);

        return new AndroidButton(
            $this->name,
            $this->actionType,
            $this->intentType,
            $this->intent,
            $this->data
        );
    }
}
