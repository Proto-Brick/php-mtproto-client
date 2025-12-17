<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickerSetThumb
 */
final class InputStickerSetThumb extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x9d84f3db;
    
    public string $predicate = 'inputStickerSetThumb';
    
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param int $thumbVersion
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly int $thumbVersion
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= Serializer::int32($this->thumbVersion);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $stickerset = AbstractInputStickerSet::deserialize($__payload, $__offset);
        $thumbVersion = Deserializer::int32($__payload, $__offset);

        return new self(
            $stickerset,
            $thumbVersion
        );
    }
}