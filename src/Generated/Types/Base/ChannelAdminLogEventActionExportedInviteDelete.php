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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invite->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $invite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
        return new self(
            $invite
        );
    }
}