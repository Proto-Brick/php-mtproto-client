<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionExportedInviteEdit
 */
final class ChannelAdminLogEventActionExportedInviteEdit extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe90ebb59;
    
    public string $_ = 'channelAdminLogEventActionExportedInviteEdit';
    
    /**
     * @param AbstractExportedChatInvite $prevInvite
     * @param AbstractExportedChatInvite $newInvite
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $prevInvite,
        public readonly AbstractExportedChatInvite $newInvite
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevInvite->serialize($serializer);
        $buffer .= $this->newInvite->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevInvite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
        $newInvite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
        return new self(
            $prevInvite,
            $newInvite
        );
    }
}