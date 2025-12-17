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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $chatId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $actorId = Deserializer::int64($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $prevParticipant = (($flags & (1 << 0)) !== 0) ? AbstractChatParticipant::deserialize($__payload, $__offset) : null;
        $newParticipant = (($flags & (1 << 1)) !== 0) ? AbstractChatParticipant::deserialize($__payload, $__offset) : null;
        $invite = (($flags & (1 << 2)) !== 0) ? AbstractExportedChatInvite::deserialize($__payload, $__offset) : null;
        $qts = Deserializer::int32($__payload, $__offset);

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