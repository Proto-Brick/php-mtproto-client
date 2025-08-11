<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateShortMessage
 */
final class UpdateShortMessage extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x313bc7f8;
    
    public string $_ = 'updateShortMessage';
    
    /**
     * @param int $id
     * @param int $userId
     * @param string $message
     * @param int $pts
     * @param int $ptsCount
     * @param int $date
     * @param bool|null $out
     * @param bool|null $mentioned
     * @param bool|null $mediaUnread
     * @param bool|null $silent
     * @param MessageFwdHeader|null $fwdFrom
     * @param int|null $viaBotId
     * @param AbstractMessageReplyHeader|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly string $message,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $date,
        public readonly ?bool $out = null,
        public readonly ?bool $mentioned = null,
        public readonly ?bool $mediaUnread = null,
        public readonly ?bool $silent = null,
        public readonly ?MessageFwdHeader $fwdFrom = null,
        public readonly ?int $viaBotId = null,
        public readonly ?AbstractMessageReplyHeader $replyTo = null,
        public readonly ?array $entities = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->out) $flags |= (1 << 1);
        if ($this->mentioned) $flags |= (1 << 4);
        if ($this->mediaUnread) $flags |= (1 << 5);
        if ($this->silent) $flags |= (1 << 13);
        if ($this->fwdFrom !== null) $flags |= (1 << 2);
        if ($this->viaBotId !== null) $flags |= (1 << 11);
        if ($this->replyTo !== null) $flags |= (1 << 3);
        if ($this->entities !== null) $flags |= (1 << 7);
        if ($this->ttlPeriod !== null) $flags |= (1 << 25);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->message);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $this->fwdFrom->serialize();
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int64($this->viaBotId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->replyTo->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 25)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $out = ($flags & (1 << 1)) ? true : null;
        $mentioned = ($flags & (1 << 4)) ? true : null;
        $mediaUnread = ($flags & (1 << 5)) ? true : null;
        $silent = ($flags & (1 << 13)) ? true : null;
        $id = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $message = Deserializer::bytes($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $fwdFrom = ($flags & (1 << 2)) ? MessageFwdHeader::deserialize($stream) : null;
        $viaBotId = ($flags & (1 << 11)) ? Deserializer::int64($stream) : null;
        $replyTo = ($flags & (1 << 3)) ? AbstractMessageReplyHeader::deserialize($stream) : null;
        $entities = ($flags & (1 << 7)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $ttlPeriod = ($flags & (1 << 25)) ? Deserializer::int32($stream) : null;
        return new self(
            $id,
            $userId,
            $message,
            $pts,
            $ptsCount,
            $date,
            $out,
            $mentioned,
            $mediaUnread,
            $silent,
            $fwdFrom,
            $viaBotId,
            $replyTo,
            $entities,
            $ttlPeriod
        );
    }
}