<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantAdmin
 */
final class ChannelParticipantAdmin extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0x34c3bb53;
    
    public string $predicate = 'channelParticipantAdmin';
    
    /**
     * @param int $userId
     * @param int $promotedBy
     * @param int $date
     * @param ChatAdminRights $adminRights
     * @param true|null $canEdit
     * @param true|null $self
     * @param int|null $inviterId
     * @param string|null $rank
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $promotedBy,
        public readonly int $date,
        public readonly ChatAdminRights $adminRights,
        public readonly ?true $canEdit = null,
        public readonly ?true $self = null,
        public readonly ?int $inviterId = null,
        public readonly ?string $rank = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canEdit) {
            $flags |= (1 << 0);
        }
        if ($this->self) {
            $flags |= (1 << 1);
        }
        if ($this->inviterId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->rank !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->inviterId);
        }
        $buffer .= Serializer::int64($this->promotedBy);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->adminRights->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->rank);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $canEdit = (($flags & (1 << 0)) !== 0) ? true : null;
        $self = (($flags & (1 << 1)) !== 0) ? true : null;
        $userId = Deserializer::int64($stream);
        $inviterId = (($flags & (1 << 1)) !== 0) ? Deserializer::int64($stream) : null;
        $promotedBy = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminRights = ChatAdminRights::deserialize($stream);
        $rank = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $userId,
            $promotedBy,
            $date,
            $adminRights,
            $canEdit,
            $self,
            $inviterId,
            $rank
        );
    }
}