<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateShortSentMessage
 */
final class UpdateShortSentMessage extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x9015e101;
    
    public string $predicate = 'updateShortSentMessage';
    
    /**
     * @param int $id
     * @param int $pts
     * @param int $ptsCount
     * @param int $date
     * @param true|null $out
     * @param AbstractMessageMedia|null $media
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $date,
        public readonly ?true $out = null,
        public readonly ?AbstractMessageMedia $media = null,
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
        if ($this->media !== null) {
            $flags |= (1 << 9);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 7);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 25);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 9)) {
            $buffer .= $this->media->serialize();
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
        $flags = Deserializer::int32($stream);
        $out = (($flags & (1 << 1)) !== 0) ? true : null;
        $id = Deserializer::int32($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $media = (($flags & (1 << 9)) !== 0) ? AbstractMessageMedia::deserialize($stream) : null;
        $entities = (($flags & (1 << 7)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $ttlPeriod = (($flags & (1 << 25)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $id,
            $pts,
            $ptsCount,
            $date,
            $out,
            $media,
            $entities,
            $ttlPeriod
        );
    }
}