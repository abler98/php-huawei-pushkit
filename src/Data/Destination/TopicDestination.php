<?php

namespace MegaKit\Huawei\PushKit\Data\Destination;

class TopicDestination extends Destination
{
    /**
     * @var string
     */
    private $topic;

    /**
     * TopicDestination constructor.
     * @param string $topic
     */
    public function __construct(string $topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * @return array
     */
    public function toRequestBody(): array
    {
        return [
            'topic' => $this->topic,
        ];
    }
}
