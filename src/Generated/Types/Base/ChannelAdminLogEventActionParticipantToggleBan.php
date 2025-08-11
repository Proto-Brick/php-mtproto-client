<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantToggleBan
 */
final class ChannelAdminLogEventActionParticipantToggleBan extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe6d83d7e;
    
    public string $_ = 'channelAdminLogEventActionParticipantToggleBan';
    
    /**
     * @param AbstractChannelParticipant $prevParticipant
     * @param AbstractChannelParticipant $newParticipant
     */
    public function __construct(
        public readonly AbstractChannelParticipant $prevParticipant,
        public readonly AbstractChannelParticipant $newParticipant
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevParticipant->serialize();
        $buffer .= $this->newParticipant->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $prevParticipant = AbstractChannelParticipant::deserialize($stream);
        $newParticipant = AbstractChannelParticipant::deserialize($stream);
        return new self(
            $prevParticipant,
            $newParticipant
        );
    }
}