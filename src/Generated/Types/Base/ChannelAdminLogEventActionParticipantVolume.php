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
    public const CONSTRUCTOR_ID = 1048537159;
    
    public string $_ = 'channelAdminLogEventActionParticipantVolume';
    
    /**
     * @param AbstractGroupCallParticipant $participant
     */
    public function __construct(
        public readonly AbstractGroupCallParticipant $participant
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->participant->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $participant = AbstractGroupCallParticipant::deserialize($deserializer, $stream);
            return new self(
            $participant
        );
    }
}