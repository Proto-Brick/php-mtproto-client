<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelParticipant
 */
final class UpdateChannelParticipant extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x985d3abb;
    
    public string $predicate = 'updateChannelParticipant';
    
    /**
     * @param int $channelId
     * @param int $date
     * @param int $actorId
     * @param int $userId
     * @param int $qts
     * @param true|null $viaChatlist
     * @param AbstractChannelParticipant|null $prevParticipant
     * @param AbstractChannelParticipant|null $newParticipant
     * @param AbstractExportedChatInvite|null $invite
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $date,
        public readonly int $actorId,
        public readonly int $userId,
        public readonly int $qts,
        public readonly ?true $viaChatlist = null,
        public readonly ?AbstractChannelParticipant $prevParticipant = null,
        public readonly ?AbstractChannelParticipant $newParticipant = null,
        public readonly ?AbstractExportedChatInvite $invite = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaChatlist) {
            $flags |= (1 << 3);
        }
        if ($this->prevParticipant !== null) {
            $flags |= (1 << 0);
        }
        if ($this->newParticipant !== null) {
            $flags |= (1 << 1);
        }
        if ($this->invite !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->actorId);
        $buffer .= Serializer::int64($this->userId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->prevParticipant->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->newParticipant->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->invite->serialize();
        }
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $viaChatlist = (($flags & (1 << 3)) !== 0) ? true : null;
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $actorId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $prevParticipant = (($flags & (1 << 0)) !== 0) ? AbstractChannelParticipant::deserialize($stream) : null;
        $newParticipant = (($flags & (1 << 1)) !== 0) ? AbstractChannelParticipant::deserialize($stream) : null;
        $invite = (($flags & (1 << 2)) !== 0) ? AbstractExportedChatInvite::deserialize($stream) : null;
        $qts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $channelId,
            $date,
            $actorId,
            $userId,
            $qts,
            $viaChatlist,
            $prevParticipant,
            $newParticipant,
            $invite
        );
    }
}