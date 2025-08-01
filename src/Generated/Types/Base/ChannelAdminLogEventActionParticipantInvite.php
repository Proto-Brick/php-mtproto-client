<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantInvite
 */
final class ChannelAdminLogEventActionParticipantInvite extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 3810276568;
    
    public string $_ = 'channelAdminLogEventActionParticipantInvite';
    
    /**
     * @param AbstractChannelParticipant $participant
     */
    public function __construct(
        public readonly AbstractChannelParticipant $participant
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
        $participant = AbstractChannelParticipant::deserialize($deserializer, $stream);
            return new self(
            $participant
        );
    }
}