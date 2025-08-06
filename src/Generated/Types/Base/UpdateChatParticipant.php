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
    
    public string $_ = 'updateChatParticipant';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->prevParticipant !== null) $flags |= (1 << 0);
        if ($this->newParticipant !== null) $flags |= (1 << 1);
        if ($this->invite !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->actorId);
        $buffer .= $serializer->int64($this->userId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->prevParticipant->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->newParticipant->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->invite->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $chatId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $actorId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $prevParticipant = ($flags & (1 << 0)) ? AbstractChatParticipant::deserialize($deserializer, $stream) : null;
        $newParticipant = ($flags & (1 << 1)) ? AbstractChatParticipant::deserialize($deserializer, $stream) : null;
        $invite = ($flags & (1 << 2)) ? AbstractExportedChatInvite::deserialize($deserializer, $stream) : null;
        $qts = $deserializer->int32($stream);
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