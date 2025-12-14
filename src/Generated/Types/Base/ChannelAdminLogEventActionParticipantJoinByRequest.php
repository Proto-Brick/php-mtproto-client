<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantJoinByRequest
 */
final class ChannelAdminLogEventActionParticipantJoinByRequest extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xafb6144a;
    
    public string $predicate = 'channelAdminLogEventActionParticipantJoinByRequest';
    
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
        Deserializer::int32($stream); // Constructor ID
        $invite = AbstractExportedChatInvite::deserialize($stream);
        $approvedBy = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $invite,
            $approvedBy
        );
    }
}