<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stickerSetFullCovered
 */
final class StickerSetFullCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x40d13c0e;
    
    public string $predicate = 'stickerSetFullCovered';
    
    /**
     * @param StickerSet $set
     * @param list<StickerPack> $packs
     * @param list<StickerKeyword> $keywords
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly array $packs,
        public readonly array $keywords,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= Serializer::vectorOfObjects($this->packs);
        $buffer .= Serializer::vectorOfObjects($this->keywords);
        $buffer .= Serializer::vectorOfObjects($this->documents);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $set = StickerSet::deserialize($__payload, $__offset);
        $packs = Deserializer::vectorOfObjects($__payload, $__offset, [StickerPack::class, 'deserialize']);
        $keywords = Deserializer::vectorOfObjects($__payload, $__offset, [StickerKeyword::class, 'deserialize']);
        $documents = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $set,
            $packs,
            $keywords,
            $documents
        );
    }
}