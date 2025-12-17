<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMessageReactions
 */
final class UpdateMessageReactions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1e297bfa;
    
    public string $predicate = 'updateMessageReactions';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param MessageReactions $reactions
     * @param int|null $topMsgId
     * @param AbstractPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly MessageReactions $reactions,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractPeer $savedPeerId = null
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
        $buffer .= Serializer::int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= $this->reactions->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $topMsgId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $savedPeerId = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $reactions = MessageReactions::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $msgId,
            $reactions,
            $topMsgId,
            $savedPeerId
        );
    }
}