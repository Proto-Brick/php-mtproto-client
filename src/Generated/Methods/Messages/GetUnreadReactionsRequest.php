<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getUnreadReactions
 */
final class GetUnreadReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbd7f90ac;
    
    public string $predicate = 'messages.getUnreadReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getUnreadReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     * @param AbstractInputPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $addOffset,
        public readonly int $limit,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractInputPeer $savedPeerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->addOffset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->minId);
        return $buffer;
    }
}