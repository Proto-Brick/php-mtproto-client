<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getForumTopicsByID
 */
final class GetForumTopicsByIDRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb0831eb9;
    
    public string $predicate = 'channels.getForumTopicsByID';
    
    public function getMethodName(): string
    {
        return 'channels.getForumTopicsByID';
    }
    
    public function getResponseClass(): string
    {
        return ForumTopics::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<int> $topics
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $topics
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfInts($this->topics);
        return $buffer;
    }
}