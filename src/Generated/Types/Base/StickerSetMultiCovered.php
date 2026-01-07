<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stickerSetMultiCovered
 */
final class StickerSetMultiCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x3407e51b;
    
    public string $predicate = 'stickerSetMultiCovered';
    
    /**
     * @param StickerSet $set
     * @param list<AbstractDocument> $covers
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly array $covers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= Serializer::vectorOfObjects($this->covers);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $set = StickerSet::deserialize($__payload, $__offset);
        $covers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $set,
            $covers
        );
    }
}