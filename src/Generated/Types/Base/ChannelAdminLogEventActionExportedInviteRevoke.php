<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionExportedInviteRevoke
 */
final class ChannelAdminLogEventActionExportedInviteRevoke extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x410a134e;
    
    public string $predicate = 'channelAdminLogEventActionExportedInviteRevoke';
    
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
        Deserializer::int32($stream); // Constructor ID
        $invite = AbstractExportedChatInvite::deserialize($stream);

        return new self(
            $invite
        );
    }
}