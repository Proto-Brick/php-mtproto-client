<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.featuredStickers
 */
final class FeaturedStickers extends AbstractFeaturedStickers
{
    public const CONSTRUCTOR_ID = 0xbe382906;
    
    public string $predicate = 'messages.featuredStickers';
    
    /**
     * @param int $hash
     * @param int $count
     * @param list<AbstractStickerSetCovered> $sets
     * @param list<int> $unread
     * @param true|null $premium
     */
    public function __construct(
        public readonly int $hash,
        public readonly int $count,
        public readonly array $sets,
        public readonly array $unread,
        public readonly ?true $premium = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premium) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        $buffer .= Serializer::vectorOfLongs($this->unread);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $premium = (($flags & (1 << 0)) !== 0) ? true : null;
        $hash = Deserializer::int64($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);
        $sets = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStickerSetCovered::class, 'deserialize']);
        $unread = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $hash,
            $count,
            $sets,
            $unread,
            $premium
        );
    }
}