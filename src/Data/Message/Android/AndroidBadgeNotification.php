<?php

namespace MegaKit\Huawei\PushKit\Data\Message\Android;

use MegaKit\Huawei\PushKit\Contracts\RequestBodySerializable;

class AndroidBadgeNotification implements RequestBodySerializable
{
    /**
     * @var int
     */
    private $addNum;

    /**
     * @var string
     */
    private $class;

    /**
     * @var int|null
     */
    private $setNum;

    /**
     * AndroidBadgeNotification constructor.
     * @param int $addNum
     * @param string $class
     * @param int|null $setNum
     * @internal
     */
    public function __construct(int $addNum, string $class, ?int $setNum)
    {
        $this->addNum = $addNum;
        $this->class = $class;
        $this->setNum = $setNum;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'add_num' => $this->addNum,
            'class' => $this->class,
            'set_num' => $this->setNum,
        ];
    }
}
