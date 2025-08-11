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
    public const CONSTRUCTOR_ID = 0xafb6144a;
    
    public string $_ = 'channelAdminLogEventActionParticipantJoinByRequest';
    
    /**
     * @param AbstractExportedChatInvite $invite
     * @param int $approvedBy
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite,
        public readonly int $approvedBy
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize();
        $buffer .= Serializer::int64($this->approvedBy);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $invite = AbstractExportedChatInvite::deserialize($stream);
        $approvedBy = Deserializer::int64($stream);
        return new self(
            $invite,
            $approvedBy
        );
    }
}