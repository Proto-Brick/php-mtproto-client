<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePinnedForumTopics
 */
final class UpdatePinnedForumTopics extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xdef143d0;
    
    public string $predicate = 'updatePinnedForumTopics';
    
    /**
     * @param AbstractPeer $peer
     * @param list<int>|null $order
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->order !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->order);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $order = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfInts($__payload, $__offset) : null;

        return new self(
            $peer,
            $order
        );
    }
}