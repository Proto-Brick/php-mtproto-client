<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantSubExtend
 */
final class ChannelAdminLogEventActionParticipantSubExtend extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 1684286899;
    
    public string $_ = 'channelAdminLogEventActionParticipantSubExtend';
    
    /**
     * @param AbstractChannelParticipant $prevParticipant
     * @param AbstractChannelParticipant $newParticipant
     */
    public function __construct(
        public readonly AbstractChannelParticipant $prevParticipant,
        public readonly AbstractChannelParticipant $newParticipant
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevParticipant->serialize($serializer);
        $buffer .= $this->newParticipant->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevParticipant = AbstractChannelParticipant::deserialize($deserializer, $stream);
        $newParticipant = AbstractChannelParticipant::deserialize($deserializer, $stream);
            return new self(
            $prevParticipant,
            $newParticipant
        );
    }
}