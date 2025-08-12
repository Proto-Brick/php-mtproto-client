<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->prevParticipant !== null) $flags |= (1 << 0);
        if ($this->newParticipant !== null) $flags |= (1 << 1);
        if ($this->invite !== null) $flags |= (1 << 2);
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
        $flags = Deserializer::int32($stream);
        $chatId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $actorId = Deserializer::int64($stream);
        $userId = Deserializer::int64($stream);
        $prevParticipant = ($flags & (1 << 0)) ? AbstractChatParticipant::deserialize($stream) : null;
        $newParticipant = ($flags & (1 << 1)) ? AbstractChatParticipant::deserialize($stream) : null;
        $invite = ($flags & (1 << 2)) ? AbstractExportedChatInvite::deserialize($stream) : null;
        $qts = Deserializer::int32($stream);

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