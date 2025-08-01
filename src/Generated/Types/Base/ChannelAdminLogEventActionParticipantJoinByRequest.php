<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantJoinByRequest
 */
final class ChannelAdminLogEventActionParticipantJoinByRequest extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 2947945546;
    
    public string $_ = 'channelAdminLogEventActionParticipantJoinByRequest';
    
    /**
     * @param AbstractExportedChatInvite $invite
     * @param int $approvedBy
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite,
        public readonly int $approvedBy
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize($serializer);
        $buffer .= $serializer->int64($this->approvedBy);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $invite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
        $approvedBy = $deserializer->int64($stream);
            return new self(
            $invite,
            $approvedBy
        );
    }
}