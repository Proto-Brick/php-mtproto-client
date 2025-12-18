<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stickerSetCovered
 */
final class StickerSetCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x6410a5d2;
    
    public string $predicate = 'stickerSetCovered';
    
    /**
     * @param StickerSet $set
     * @param AbstractDocument $cover
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly AbstractDocument $cover
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= $this->cover->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $set = StickerSet::deserialize($__payload, $__offset);
        $cover = AbstractDocument::deserialize($__payload, $__offset);

        return new self(
            $set,
            $cover
        );
    }
}