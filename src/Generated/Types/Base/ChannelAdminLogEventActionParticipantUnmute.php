<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantUnmute
 */
final class ChannelAdminLogEventActionParticipantUnmute extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe64429c0;
    
    public string $_ = 'channelAdminLogEventActionParticipantUnmute';
    
    /**
     * @param GroupCallParticipant $participant
     */
    public function __construct(
        public readonly GroupCallParticipant $participant
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
        $participant = GroupCallParticipant::deserialize($deserializer, $stream);
        return new self(
            $participant
        );
    }
}