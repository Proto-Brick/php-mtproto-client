<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantVolume
 */
final class ChannelAdminLogEventActionParticipantVolume extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x3e7f6847;
    
    public string $predicate = 'channelAdminLogEventActionParticipantVolume';
    
    /**
     * @param GroupCallParticipant $participant
     */
    public function __construct(
        public readonly GroupCallParticipant $participant
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->participant->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $participant = GroupCallParticipant::deserialize($__payload, $__offset);

        return new self(
            $participant
        );
    }
}