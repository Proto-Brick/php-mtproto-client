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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $participant = AbstractChannelParticipant::deserialize($stream);

        return new self(
            $participant
        );
    }
}