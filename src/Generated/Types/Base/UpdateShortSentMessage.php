<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateShortSentMessage
 */
final class UpdateShortSentMessage extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x9015e101;
    
    public string $_ = 'updateShortSentMessage';
    
    /**
     * @param int $id
     * @param int $pts
     * @param int $ptsCount
     * @param int $date
     * @param bool|null $out
     * @param AbstractMessageMedia|null $media
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $date,
        public readonly ?bool $out = null,
        public readonly ?AbstractMessageMedia $media = null,
        public readonly ?array $entities = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->out) $flags |= (1 << 1);
        if ($this->media !== null) $flags |= (1 << 9);
        if ($this->entities !== null) $flags |= (1 << 7);
        if ($this->ttlPeriod !== null) $flags |= (1 << 25);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 9)) {
            $buffer .= $this->media->serialize($serializer);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 25)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $out = ($flags & (1 << 1)) ? true : null;
        $id = $deserializer->int32($stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $media = ($flags & (1 << 9)) ? AbstractMessageMedia::deserialize($deserializer, $stream) : null;
        $entities = ($flags & (1 << 7)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $ttlPeriod = ($flags & (1 << 25)) ? $deserializer->int32($stream) : null;
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