<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionExportedInviteDelete
 */
final class ChannelAdminLogEventActionExportedInviteDelete extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5a50fca4;
    
    public string $_ = 'channelAdminLogEventActionExportedInviteDelete';
    
    /**
     * @param AbstractExportedChatInvite $invite
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $invite = AbstractExportedChatInvite::deserialize($stream);
        return new self(
            $invite
        );
    }
}