<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.updatePinnedForumTopic
 */
final class UpdatePinnedForumTopicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x175df251;
    
    public string $predicate = 'messages.updatePinnedForumTopic';
    
    public function getMethodName(): string
    {
        return 'messages.updatePinnedForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $topicId
     * @param bool $pinned
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $topicId,
        public readonly bool $pinned
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topicId);
        $buffer .= ($this->pinned ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}