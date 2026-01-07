<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StickerPack;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.recentStickers
 */
final class RecentStickers extends AbstractRecentStickers
{
    public const CONSTRUCTOR_ID = 0x88d37c56;
    
    public string $predicate = 'messages.recentStickers';
    
    /**
     * @param int $hash
     * @param list<StickerPack> $packs
     * @param list<AbstractDocument> $stickers
     * @param list<int> $dates
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $packs,
        public readonly array $stickers,
        public readonly array $dates
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->packs);
        $buffer .= Serializer::vectorOfObjects($this->stickers);
        $buffer .= Serializer::vectorOfInts($this->dates);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $packs = Deserializer::vectorOfObjects($__payload, $__offset, [StickerPack::class, 'deserialize']);
        $stickers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);
        $dates = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $hash,
            $packs,
            $stickers,
            $dates
        );
    }
}