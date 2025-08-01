<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipantAdmin
 */
final class ChannelParticipantAdmin extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 885242707;
    
    public string $_ = 'channelParticipantAdmin';
    
    /**
     * @param int $userId
     * @param int $promotedBy
     * @param int $date
     * @param AbstractChatAdminRights $adminRights
     * @param bool|null $canEdit
     * @param bool|null $self
     * @param int|null $inviterId
     * @param string|null $rank
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $promotedBy,
        public readonly int $date,
        public readonly AbstractChatAdminRights $adminRights,
        public readonly ?bool $canEdit = null,
        public readonly ?bool $self = null,
        public readonly ?int $inviterId = null,
        public readonly ?string $rank = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canEdit) $flags |= (1 << 0);
        if ($this->self) $flags |= (1 << 1);
        if ($this->inviterId !== null) $flags |= (1 << 1);
        if ($this->rank !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->inviterId);
        }
        $buffer .= $serializer->int64($this->promotedBy);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->adminRights->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->rank);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $canEdit = ($flags & (1 << 0)) ? true : null;
        $self = ($flags & (1 << 1)) ? true : null;
        $userId = $deserializer->int64($stream);
        $inviterId = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
        $promotedBy = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $adminRights = AbstractChatAdminRights::deserialize($deserializer, $stream);
        $rank = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
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