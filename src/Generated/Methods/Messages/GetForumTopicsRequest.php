<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getForumTopics
 */
final class GetForumTopicsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3ba47bff;
    
    public string $predicate = 'messages.getForumTopics';
    
    public function getMethodName(): string
    {
        return 'messages.getForumTopics';
    }
    
    public function getResponseClass(): string
    {
        return ForumTopics::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetDate
     * @param int $offsetId
     * @param int $offsetTopic
     * @param int $limit
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetDate,
        public readonly int $offsetId,
        public readonly int $offsetTopic,
        public readonly int $limit,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->q !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->q);
        }
        $buffer .= Serializer::int32($this->offsetDate);
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->offsetTopic);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}