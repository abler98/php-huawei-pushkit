<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidClickAction;
use Webmozart\Assert\Assert;

class AndroidClickActionBuilder
{
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
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param int $type
     * @return static
     */
    public function setType(int $type): self
    {
        Assert::inArray($type, [
            AndroidClickAction::TYPE_APP_PAGE,
            AndroidClickAction::TYPE_URL,
            AndroidClickAction::TYPE_START_APP,
        ]);

        $this->type = $type;

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
     * @param string|null $url
     * @return static
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string|null $action
     * @return static
     */
    public function setAction(?string $action): self
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return AndroidClickAction
     */
    public function build(): AndroidClickAction
    {
        Assert::notNull($this->type);

        return new AndroidClickAction(
            $this->type,
            $this->intent,
            $this->url,
            $this->action
        );
    }
}
