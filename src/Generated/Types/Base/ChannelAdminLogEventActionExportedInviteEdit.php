<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionExportedInviteEdit
 */
final class ChannelAdminLogEventActionExportedInviteEdit extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe90ebb59;
    
    public string $predicate = 'channelAdminLogEventActionExportedInviteEdit';
    
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
        Deserializer::int32($stream); // Constructor ID
        $prevInvite = AbstractExportedChatInvite::deserialize($stream);
        $newInvite = AbstractExportedChatInvite::deserialize($stream);

        return new self(
            $prevInvite,
            $newInvite
        );
    }
}