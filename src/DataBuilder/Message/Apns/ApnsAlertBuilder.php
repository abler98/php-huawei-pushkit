<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Apns;

use MegaKit\Huawei\PushKit\Data\Message\Apns\ApnsAlert;
use Webmozart\Assert\Assert;

class ApnsAlertBuilder
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
     * @param string|null $titleLocKey
     * @return static
     */
    public function setTitleLocKey(?string $titleLocKey): self
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * @param array|null $titleLocArgs
     * @return static
     */
    public function setTitleLocArgs(?array $titleLocArgs): self
    {
        $this->titleLocArgs = $titleLocArgs;

        return $this;
    }

    /**
     * @param string|null $actionLocKey
     * @return static
     */
    public function setActionLocKey(?string $actionLocKey): self
    {
        $this->actionLocKey = $actionLocKey;

        return $this;
    }

    /**
     * @param string|null $locKey
     * @return static
     */
    public function setLocKey(?string $locKey): self
    {
        $this->locKey = $locKey;

        return $this;
    }

    /**
     * @param array|null $locArgs
     * @return static
     */
    public function setLocArgs(?array $locArgs): self
    {
        $this->locArgs = $locArgs;

        return $this;
    }

    /**
     * @param string|null $launchImage
     * @return static
     */
    public function setLaunchImage(?string $launchImage): self
    {
        $this->launchImage = $launchImage;

        return $this;
    }

    /**
     * @return ApnsAlert
     */
    public function build(): ApnsAlert
    {
        Assert::notNull($this->title);
        Assert::notNull($this->body);

        return new ApnsAlert(
            $this->title,
            $this->body,
            $this->titleLocKey,
            $this->titleLocArgs,
            $this->actionLocKey,
            $this->locKey,
            $this->locArgs,
            $this->launchImage
        );
    }
}
