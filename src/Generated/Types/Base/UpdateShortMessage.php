<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateShortMessage
 */
final class UpdateShortMessage extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x313bc7f8;
    
    public string $predicate = 'updateShortMessage';
    
    /**
     * @param int $id
     * @param int $userId
     * @param string $message
     * @param int $pts
     * @param int $ptsCount
     * @param int $date
     * @param true|null $out
     * @param true|null $mentioned
     * @param true|null $mediaUnread
     * @param true|null $silent
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
        public readonly ?true $out = null,
        public readonly ?true $mentioned = null,
        public readonly ?true $mediaUnread = null,
        public readonly ?true $silent = null,
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
        if ($this->out) {
            $flags |= (1 << 1);
        }
        if ($this->mentioned) {
            $flags |= (1 << 4);
        }
        if ($this->mediaUnread) {
            $flags |= (1 << 5);
        }
        if ($this->silent) {
            $flags |= (1 << 13);
        }
        if ($this->fwdFrom !== null) {
            $flags |= (1 << 2);
        }
        if ($this->viaBotId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 3);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 7);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 25);
        }
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
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $out = (($flags & (1 << 1)) !== 0) ? true : null;
        $mentioned = (($flags & (1 << 4)) !== 0) ? true : null;
        $mediaUnread = (($flags & (1 << 5)) !== 0) ? true : null;
        $silent = (($flags & (1 << 13)) !== 0) ? true : null;
        $id = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $message = Deserializer::bytes($stream);
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $ptsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $fwdFrom = (($flags & (1 << 2)) !== 0) ? MessageFwdHeader::deserialize($stream) : null;
        $viaBotId = (($flags & (1 << 11)) !== 0) ? Deserializer::int64($stream) : null;
        $replyTo = (($flags & (1 << 3)) !== 0) ? AbstractMessageReplyHeader::deserialize($stream) : null;
        $entities = (($flags & (1 << 7)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $ttlPeriod = (($flags & (1 << 25)) !== 0) ? Deserializer::int32($stream) : null;

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