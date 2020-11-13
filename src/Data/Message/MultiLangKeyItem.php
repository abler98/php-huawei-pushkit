<?php

namespace MegaKit\Huawei\PushKit\Data\Message;

class MultiLangKeyItem
{
    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $value;

    /**
     * MultiLangKeyItem constructor.
     * @param string $lang
     * @param string $value
     */
    public function __construct(string $lang, string $value)
    {
        $this->lang = $lang;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
