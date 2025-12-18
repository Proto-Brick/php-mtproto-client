<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGeoProximityReached
 */
final class MessageActionGeoProximityReached extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x98e0d697;
    
    public string $predicate = 'messageActionGeoProximityReached';
    
    /**
     * @param AbstractPeer $fromId
     * @param AbstractPeer $toId
     * @param int $distance
     */
    public function __construct(
        public readonly AbstractPeer $fromId,
        public readonly AbstractPeer $toId,
        public readonly int $distance
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->fromId->serialize();
        $buffer .= $this->toId->serialize();
        $buffer .= Serializer::int32($this->distance);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $fromId = AbstractPeer::deserialize($__payload, $__offset);
        $toId = AbstractPeer::deserialize($__payload, $__offset);
        $distance = Deserializer::int32($__payload, $__offset);

        return new self(
            $fromId,
            $toId,
            $distance
        );
    }
}