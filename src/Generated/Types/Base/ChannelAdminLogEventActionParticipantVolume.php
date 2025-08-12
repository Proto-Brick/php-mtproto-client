<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $participant = GroupCallParticipant::deserialize($stream);

        return new self(
            $participant
        );
    }
}