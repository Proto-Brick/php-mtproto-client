<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatParticipant
 */
final class UpdateChatParticipant extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd087663a;
    
    public string $predicate = 'updateChatParticipant';
    
    /**
     * @param int $chatId
     * @param int $date
     * @param int $actorId
     * @param int $userId
     * @param int $qts
     * @param AbstractChatParticipant|null $prevParticipant
     * @param AbstractChatParticipant|null $newParticipant
     * @param AbstractExportedChatInvite|null $invite
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $date,
        public readonly int $actorId,
        public readonly int $userId,
        public readonly int $qts,
        public readonly ?AbstractChatParticipant $prevParticipant = null,
        public readonly ?AbstractChatParticipant $newParticipant = null,
        public readonly ?AbstractExportedChatInvite $invite = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
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
        $buffer .= Serializer::int64($this->chatId);
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
        $chatId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $actorId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $prevParticipant = (($flags & (1 << 0)) !== 0) ? AbstractChatParticipant::deserialize($stream) : null;
        $newParticipant = (($flags & (1 << 1)) !== 0) ? AbstractChatParticipant::deserialize($stream) : null;
        $invite = (($flags & (1 << 2)) !== 0) ? AbstractExportedChatInvite::deserialize($stream) : null;
        $qts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $chatId,
            $date,
            $actorId,
            $userId,
            $qts,
            $prevParticipant,
            $newParticipant,
            $invite
        );
    }
}