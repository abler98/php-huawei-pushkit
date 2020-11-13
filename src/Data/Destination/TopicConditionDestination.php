<?php

namespace MegaKit\Huawei\PushKit\Data\Destination;

class TopicConditionDestination extends Destination
{
    /**
     * @var string
     */
    private $condition;

    /**
     * TopicConditionDestination constructor.
     * @param string $condition
     */
    public function __construct(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'condition' => $this->condition,
        ];
    }
}
