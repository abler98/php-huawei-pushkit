<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use DateTime;
use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;
use MegaKit\Huawei\PushKit\Data\Message\MultiLangKey;

class AndroidNotification implements RequestBodySerializable
{
    /**
     * Default style
     */
    const STYLE_DEFAULT = 0;

    /**
     * Large text
     */
    const STYLE_LARGE = 1;

    /**
     * Inbox style
     */
    const STYLE_INBOX = 2;

    /**
     * NC will generate a unique ID for the message
     */
    const NOTIFY_ID_UNIQUE = -1;

    /**
     * Common (silent) message
     */
    const IMPORTANCE_LOW = 'LOW';

    /**
     * Important message
     */
    const IMPORTANCE_NORMAL = 'NORMAL';

    /**
     * Visibility unspecified
     */
    const VISIBILITY_UNSPECIFIED = 'VISIBILITY_UNSPECIFIED';

    /**
     * Private visibility
     */
    const VISIBILITY_PRIVATE = 'PRIVATE';

    /**
     * Public visibility
     */
    const VISIBILITY_PUBLIC = 'PUBLIC';

    /**
     * Secret visibility
     */
    const VISIBILITY_SECRET = 'SECRET';

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
     * AndroidNotification constructor.
     * @param string|null $title
     * @param string|null $body
     * @param string|null $icon
     * @param string|null $color
     * @param string|null $sound
     * @param bool|null $defaultSound
     * @param string|null $tag
     * @param AndroidClickAction|null $clickAction
     * @param string|null $bodyLocKey
     * @param array|null $bodyLocArgs
     * @param string|null $titleLocKey
     * @param array|null $titleLocArgs
     * @param MultiLangKey|null $multiLangKey
     * @param string|null $channelId
     * @param string|null $notifySummary
     * @param string|null $image
     * @param int|null $style
     * @param string|null $bigTitle
     * @param string|null $bigBody
     * @param int|null $autoClear
     * @param int|null $notifyId
     * @param string|null $group
     * @param AndroidBadgeNotification|null $badge
     * @param string|null $ticker
     * @param bool|null $autoCancel
     * @param DateTime|null $when
     * @param string|null $importance
     * @param bool|null $useDefaultVibrate
     * @param bool|null $useDefaultLight
     * @param AndroidVibrateConfig|null $vibrateConfig
     * @param string|null $visibility
     * @param AndroidLightSettings|null $lightSettings
     * @param bool|null $foregroundShow
     * @param string|null $profileId
     * @param array|null $inboxContent
     * @param AndroidButton[]|null $buttons
     */
    public function __construct(
        ?string $title,
        ?string $body,
        ?string $icon,
        ?string $color,
        ?string $sound,
        ?bool $defaultSound,
        ?string $tag,
        ?AndroidClickAction $clickAction,
        ?string $bodyLocKey,
        ?array $bodyLocArgs,
        ?string $titleLocKey,
        ?array $titleLocArgs,
        ?MultiLangKey $multiLangKey,
        ?string $channelId,
        ?string $notifySummary,
        ?string $image,
        ?int $style,
        ?string $bigTitle,
        ?string $bigBody,
        ?int $autoClear,
        ?int $notifyId,
        ?string $group,
        ?AndroidBadgeNotification $badge,
        ?string $ticker,
        ?bool $autoCancel,
        ?DateTime $when,
        ?string $importance,
        ?bool $useDefaultVibrate,
        ?bool $useDefaultLight,
        ?AndroidVibrateConfig $vibrateConfig,
        ?string $visibility,
        ?AndroidLightSettings $lightSettings,
        ?bool $foregroundShow,
        ?string $profileId,
        ?array $inboxContent,
        ?array $buttons
    ) {
        $this->title = $title;
        $this->body = $body;
        $this->icon = $icon;
        $this->color = $color;
        $this->sound = $sound;
        $this->defaultSound = $defaultSound;
        $this->tag = $tag;
        $this->clickAction = $clickAction;
        $this->bodyLocKey = $bodyLocKey;
        $this->bodyLocArgs = $bodyLocArgs;
        $this->titleLocKey = $titleLocKey;
        $this->titleLocArgs = $titleLocArgs;
        $this->multiLangKey = $multiLangKey;
        $this->channelId = $channelId;
        $this->notifySummary = $notifySummary;
        $this->image = $image;
        $this->style = $style;
        $this->bigTitle = $bigTitle;
        $this->bigBody = $bigBody;
        $this->autoClear = $autoClear;
        $this->notifyId = $notifyId;
        $this->group = $group;
        $this->badge = $badge;
        $this->ticker = $ticker;
        $this->autoCancel = $autoCancel;
        $this->when = $when;
        $this->importance = $importance;
        $this->useDefaultVibrate = $useDefaultVibrate;
        $this->useDefaultLight = $useDefaultLight;
        $this->vibrateConfig = $vibrateConfig;
        $this->visibility = $visibility;
        $this->lightSettings = $lightSettings;
        $this->foregroundShow = $foregroundShow;
        $this->profileId = $profileId;
        $this->inboxContent = $inboxContent;
        $this->buttons = $buttons;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        $body = [
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->icon,
            'color' => $this->color,
            'sound' => $this->sound,
            'default_sound' => $this->defaultSound,
            'tag' => $this->tag,
            'body_loc_key' => $this->bodyLocKey,
            'body_loc_args' => $this->bodyLocArgs,
            'title_loc_key' => $this->titleLocKey,
            'title_loc_args' => $this->titleLocArgs,
            'channel_id' => $this->channelId,
            'notify_summary' => $this->notifySummary,
            'image' => $this->image,
            'style' => $this->style,
            'big_title' => $this->bigTitle,
            'big_body' => $this->bigBody,
            'auto_clear' => $this->autoClear,
            'notify_id' => $this->notifyId,
            'group' => $this->group,
            'ticker' => $this->ticker,
            'auto_cancel' => $this->autoCancel,
            'importance' => $this->importance,
            'use_default_vibrate' => $this->useDefaultVibrate,
            'use_default_light' => $this->useDefaultLight,
            'visibility' => $this->visibility,
            'foreground_show' => $this->foregroundShow,
            'profile_id' => $this->profileId,
            'inbox_content' => $this->inboxContent,
        ];

        if ($this->clickAction !== null) {
            $body['click_action'] = $this->clickAction->toRequestBody();
        }

        if ($this->multiLangKey !== null) {
            $body['multi_lang_key'] = $this->multiLangKey->toRequestBody();
        }

        if ($this->badge !== null) {
            $body['badge'] = $this->badge->toRequestBody();
        }

        if ($this->when !== null) {
            $body['when'] = $this->when->format('Y-m-d\TH:i:s.u\Z');
        }

        if ($this->vibrateConfig !== null) {
            $body['vibrate_config'] = $this->vibrateConfig->toRequestBody();
        }

        if ($this->lightSettings !== null) {
            $body['light_settings'] = $this->lightSettings->toRequestBody();
        }

        if ($this->buttons !== null) {
            $body['buttons'] = array_map(function (AndroidButton $button) {
                return $button->toRequestBody();
            }, $this->buttons);
        }

        return $body;
    }
}
