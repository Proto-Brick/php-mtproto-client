<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantLeft
 */
final class ChannelParticipantLeft extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0x1b03f006;
    
    public string $predicate = 'channelParticipantLeft';
    
    /**
     * @param AbstractPeer $peer
     */
    public function __construct(
        public readonly AbstractPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $peer
        );
    }
}