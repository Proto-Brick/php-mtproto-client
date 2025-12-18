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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $invite = AbstractExportedChatInvite::deserialize($__payload, $__offset);
        $approvedBy = Deserializer::int64($__payload, $__offset);

        return new self(
            $invite,
            $approvedBy
        );
    }
}