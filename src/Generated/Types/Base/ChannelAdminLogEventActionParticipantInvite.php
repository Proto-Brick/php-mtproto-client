<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantInvite
 */
final class ChannelAdminLogEventActionParticipantInvite extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe31c34d8;
    
    public string $predicate = 'channelAdminLogEventActionParticipantInvite';
    
    /**
     * @param AbstractChannelParticipant $participant
     */
    public function __construct(
        public readonly AbstractChannelParticipant $participant
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->participant->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $participant = AbstractChannelParticipant::deserialize($__payload, $__offset);

        return new self(
            $participant
        );
    }
}