<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messagePeerReaction
 */
final class MessagePeerReaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c79b63c;
    
    public string $predicate = 'messagePeerReaction';
    
    /**
     * @param AbstractPeer $peerId
     * @param int $date
     * @param AbstractReaction $reaction
     * @param true|null $big
     * @param true|null $unread
     * @param true|null $my
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly AbstractReaction $reaction,
        public readonly ?true $big = null,
        public readonly ?true $unread = null,
        public readonly ?true $my = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) {
            $flags |= (1 << 0);
        }
        if ($this->unread) {
            $flags |= (1 << 1);
        }
        if ($this->my) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peerId->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $big = (($flags & (1 << 0)) !== 0) ? true : null;
        $unread = (($flags & (1 << 1)) !== 0) ? true : null;
        $my = (($flags & (1 << 2)) !== 0) ? true : null;
        $peerId = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $reaction = AbstractReaction::deserialize($__payload, $__offset);

        return new self(
            $peerId,
            $date,
            $reaction,
            $big,
            $unread,
            $my
        );
    }
}