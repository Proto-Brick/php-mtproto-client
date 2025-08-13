<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantUnmute
 */
final class ChannelAdminLogEventActionParticipantUnmute extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe64429c0;
    
    public string $predicate = 'channelAdminLogEventActionParticipantUnmute';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $participant = GroupCallParticipant::deserialize($stream);

        return new self(
            $participant
        );
    }
}