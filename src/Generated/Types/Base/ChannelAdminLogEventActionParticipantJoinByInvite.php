<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantJoinByInvite
 */
final class ChannelAdminLogEventActionParticipantJoinByInvite extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xfe9fc158;
    
    public string $predicate = 'channelAdminLogEventActionParticipantJoinByInvite';
    
    /**
     * @param AbstractExportedChatInvite $invite
     * @param true|null $viaChatlist
     */
    public function __construct(
        public readonly AbstractExportedChatInvite $invite,
        public readonly ?true $viaChatlist = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaChatlist) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->invite->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $viaChatlist = (($flags & (1 << 0)) !== 0) ? true : null;
        $invite = AbstractExportedChatInvite::deserialize($stream);

        return new self(
            $invite,
            $viaChatlist
        );
    }
}