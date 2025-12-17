<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stickerSetNoCovered
 */
final class StickerSetNoCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x77b15d1c;
    
    public string $predicate = 'stickerSetNoCovered';
    
    /**
     * @param StickerSet $set
     */
    public function __construct(
        public readonly StickerSet $set
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $set = StickerSet::deserialize($__payload, $__offset);

        return new self(
            $set
        );
    }
}