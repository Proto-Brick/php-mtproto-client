<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.updatePinnedForumTopic
 */
final class UpdatePinnedForumTopicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6c2d9026;
    
    public string $predicate = 'channels.updatePinnedForumTopic';
    
    public function getMethodName(): string
    {
        return 'channels.updatePinnedForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topicId
     * @param bool $pinned
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topicId,
        public readonly bool $pinned
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->topicId);
        $buffer .= ($this->pinned ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}