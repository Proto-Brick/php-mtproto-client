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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevInvite->serialize();
        $buffer .= $this->newInvite->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $prevInvite = AbstractExportedChatInvite::deserialize($stream);
        $newInvite = AbstractExportedChatInvite::deserialize($stream);
        return new self(
            $prevInvite,
            $newInvite
        );
    }
}