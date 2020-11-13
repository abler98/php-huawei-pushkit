<?php

namespace MegaKit\Huawei\PushKit\DataBuilder\Message\Android;

use DateTime;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidBadgeNotification;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidButton;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidClickAction;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidLightSettings;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidNotification;
use MegaKit\Huawei\PushKit\Data\Message\Android\AndroidVibrateConfig;
use MegaKit\Huawei\PushKit\Data\Message\MultiLangKey;
use Webmozart\Assert\Assert;

class AndroidNotificationBuilder
{
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var string|null
     */
    private $icon;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $sound;

    /**
     * @var bool|null
     */
    private $defaultSound;

    /**
     * @var string|null
     */
    private $tag;

    /**
     * @var AndroidClickAction|null
     */
    private $clickAction;

    /**
     * @var string|null
     */
    private $bodyLocKey;

    /**
     * @var array|null
     */
    private $bodyLocArgs;

    /**
     * @var string|null
     */
    private $titleLocKey;

    /**
     * @var array|null
     */
    private $titleLocArgs;

    /**
     * @var MultiLangKey|null
     */
    private $multiLangKey;

    /**
     * @var string|null
     */
    private $channelId;

    /**
     * @var string|null
     */
    private $notifySummary;

    /**
     * @var string|null
     */
    private $image;

    /**
     * @var int|null
     */
    private $style;

    /**
     * @var string|null
     */
    private $bigTitle;

    /**
     * @var string|null
     */
    private $bigBody;

    /**
     * @var int|null
     */
    private $autoClear;

    /**
     * @var int|null
     */
    private $notifyId;

    /**
     * @var string|null
     */
    private $group;

    /**
     * @var AndroidBadgeNotification|null
     */
    private $badge;

    /**
     * @var string|null
     */
    private $ticker;

    /**
     * @var bool|null
     */
    private $autoCancel;

    /**
     * @var DateTime|null
     */
    private $when;

    /**
     * @var string|null
     */
    private $importance;

    /**
     * @var bool|null
     */
    private $useDefaultVibrate;

    /**
     * @var bool|null
     */
    private $useDefaultLight;

    /**
     * @var AndroidVibrateConfig|null
     */
    private $vibrateConfig;

    /**
     * @var string|null
     */
    private $visibility;

    /**
     * @var AndroidLightSettings|null
     */
    private $lightSettings;

    /**
     * @var bool|null
     */
    private $foregroundShow;

    /**
     * @var string|null
     */
    private $profileId;

    /**
     * @var array|null
     */
    private $inboxContent;

    /**
     * @var AndroidButton[]|null
     */
    private $buttons;

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @param string|null $title
     * @return static
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string|null $body
     * @return static
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }


    /**
     * @param string|null $icon
     * @return static
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @param string|null $color
     * @return static
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param string|null $sound
     * @return static
     */
    public function setSound(?string $sound): self
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @param bool|null $defaultSound
     * @return static
     */
    public function setDefaultSound(?bool $defaultSound): self
    {
        $this->defaultSound = $defaultSound;

        return $this;
    }

    /**
     * @param string|null $tag
     * @return static
     */
    public function setTag(?string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @param AndroidClickAction|null $clickAction
     * @return static
     */
    public function setClickAction(?AndroidClickAction $clickAction): self
    {
        $this->clickAction = $clickAction;

        return $this;
    }

    /**
     * @param string|null $bodyLocKey
     * @return static
     */
    public function setBodyLocKey(?string $bodyLocKey): self
    {
        $this->bodyLocKey = $bodyLocKey;

        return $this;
    }

    /**
     * @param array|null $bodyLocArgs
     * @return static
     */
    public function setBodyLocArgs(?array $bodyLocArgs): self
    {
        $this->bodyLocArgs = $bodyLocArgs;

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
     * @param MultiLangKey|null $multiLangKey
     * @return static
     */
    public function setMultiLangKey(?MultiLangKey $multiLangKey): self
    {
        $this->multiLangKey = $multiLangKey;

        return $this;
    }

    /**
     * @param string|null $channelId
     * @return static
     */
    public function setChannelId(?string $channelId): self
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * @param string|null $notifySummary
     * @return static
     */
    public function setNotifySummary(?string $notifySummary): self
    {
        $this->notifySummary = $notifySummary;

        return $this;
    }

    /**
     * @param string|null $image
     * @return static
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param int|null $style
     * @return static
     */
    public function setStyle(?int $style): self
    {
        Assert::nullOrInArray($style, [
            AndroidNotification::STYLE_DEFAULT,
            AndroidNotification::STYLE_LARGE,
            AndroidNotification::STYLE_INBOX,
        ]);

        $this->style = $style;

        return $this;
    }

    /**
     * @param string|null $bigTitle
     * @return static
     */
    public function setBigTitle(?string $bigTitle): self
    {
        $this->bigTitle = $bigTitle;

        return $this;
    }

    /**
     * @param string|null $bigBody
     * @return static
     */
    public function setBigBody(?string $bigBody): self
    {
        $this->bigBody = $bigBody;

        return $this;
    }

    /**
     * @param int|null $autoClear
     * @return static
     */
    public function setAutoClear(?int $autoClear): self
    {
        $this->autoClear = $autoClear;

        return $this;
    }

    /**
     * @param int|null $notifyId
     * @return static
     */
    public function setNotifyId(?int $notifyId): self
    {
        $this->notifyId = $notifyId;

        return $this;
    }

    /**
     * @param string|null $group
     * @return static
     */
    public function setGroup(?string $group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @param AndroidBadgeNotification|null $badge
     * @return static
     */
    public function setBadge(?AndroidBadgeNotification $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @param string|null $ticker
     * @return static
     */
    public function setTicker(?string $ticker): self
    {
        $this->ticker = $ticker;

        return $this;
    }

    /**
     * @param bool|null $autoCancel
     * @return static
     */
    public function setAutoCancel(?bool $autoCancel): self
    {
        $this->autoCancel = $autoCancel;

        return $this;
    }

    /**
     * @param DateTime|null $when
     * @return static
     */
    public function setWhen(?DateTime $when): self
    {
        $this->when = $when;

        return $this;
    }

    /**
     * @param string|null $importance
     * @return static
     */
    public function setImportance(?string $importance): self
    {
        Assert::nullOrInArray($importance, [
            AndroidNotification::IMPORTANCE_LOW,
            AndroidNotification::IMPORTANCE_NORMAL,
        ]);

        $this->importance = $importance;

        return $this;
    }

    /**
     * @param bool|null $useDefaultVibrate
     * @return static
     */
    public function setUseDefaultVibrate(?bool $useDefaultVibrate): self
    {
        $this->useDefaultVibrate = $useDefaultVibrate;

        return $this;
    }

    /**
     * @param bool|null $useDefaultLight
     * @return static
     */
    public function setUseDefaultLight(?bool $useDefaultLight): self
    {
        $this->useDefaultLight = $useDefaultLight;

        return $this;
    }

    /**
     * @param AndroidVibrateConfig|null $vibrateConfig
     * @return static
     */
    public function setVibrateConfig(?AndroidVibrateConfig $vibrateConfig): self
    {
        $this->vibrateConfig = $vibrateConfig;

        return $this;
    }

    /**
     * @param string|null $visibility
     * @return static
     */
    public function setVisibility(?string $visibility): self
    {
        Assert::nullOrInArray($visibility, [
            AndroidNotification::VISIBILITY_UNSPECIFIED,
            AndroidNotification::VISIBILITY_PRIVATE,
            AndroidNotification::VISIBILITY_PUBLIC,
            AndroidNotification::VISIBILITY_SECRET,
        ]);

        $this->visibility = $visibility;

        return $this;
    }

    /**
     * @param AndroidLightSettings|null $lightSettings
     * @return static
     */
    public function setLightSettings(?AndroidLightSettings $lightSettings): self
    {
        $this->lightSettings = $lightSettings;

        return $this;
    }

    /**
     * @param bool|null $foregroundShow
     * @return static
     */
    public function setForegroundShow(?bool $foregroundShow): self
    {
        $this->foregroundShow = $foregroundShow;

        return $this;
    }

    /**
     * @param string|null $profileId
     * @return static
     */
    public function setProfileId(?string $profileId): self
    {
        $this->profileId = $profileId;

        return $this;
    }

    /**
     * @param array|null $inboxContent
     * @return static
     */
    public function setInboxContent(?array $inboxContent): self
    {
        $this->inboxContent = $inboxContent;

        return $this;
    }

    /**
     * @param AndroidButton[]|null $buttons
     * @return static
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;

        return $this;
    }

    /**
     * @return AndroidNotification
     */
    public function build(): AndroidNotification
    {
        return new AndroidNotification(
            $this->title,
            $this->body,
            $this->icon,
            $this->color,
            $this->sound,
            $this->defaultSound,
            $this->tag,
            $this->clickAction,
            $this->bodyLocKey,
            $this->bodyLocArgs,
            $this->titleLocKey,
            $this->titleLocArgs,
            $this->multiLangKey,
            $this->channelId,
            $this->notifySummary,
            $this->image,
            $this->style,
            $this->bigTitle,
            $this->bigBody,
            $this->autoClear,
            $this->notifyId,
            $this->group,
            $this->badge,
            $this->ticker,
            $this->autoCancel,
            $this->when,
            $this->importance,
            $this->useDefaultVibrate,
            $this->useDefaultLight,
            $this->vibrateConfig,
            $this->visibility,
            $this->lightSettings,
            $this->foregroundShow,
            $this->profileId,
            $this->inboxContent,
            $this->buttons
        );
    }
}
