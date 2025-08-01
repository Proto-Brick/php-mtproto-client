<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelParticipant
 */
final class UpdateChannelParticipant extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2556246715;
    
    public string $_ = 'updateChannelParticipant';
    
    /**
     * @param int $channelId
     * @param int $date
     * @param int $actorId
     * @param int $userId
     * @param int $qts
     * @param bool|null $viaChatlist
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
        public readonly ?bool $viaChatlist = null,
        public readonly ?AbstractChannelParticipant $prevParticipant = null,
        public readonly ?AbstractChannelParticipant $newParticipant = null,
        public readonly ?AbstractExportedChatInvite $invite = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaChatlist) $flags |= (1 << 3);
        if ($this->prevParticipant !== null) $flags |= (1 << 0);
        if ($this->newParticipant !== null) $flags |= (1 << 1);
        if ($this->invite !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
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

        $viaChatlist = ($flags & (1 << 3)) ? true : null;
        $channelId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $actorId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $prevParticipant = ($flags & (1 << 0)) ? AbstractChannelParticipant::deserialize($deserializer, $stream) : null;
        $newParticipant = ($flags & (1 << 1)) ? AbstractChannelParticipant::deserialize($deserializer, $stream) : null;
        $invite = ($flags & (1 << 2)) ? AbstractExportedChatInvite::deserialize($deserializer, $stream) : null;
        $qts = $deserializer->int32($stream);
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