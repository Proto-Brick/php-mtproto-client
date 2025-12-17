<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickerSetPremiumGifts
 */
final class InputStickerSetPremiumGifts extends AbstractInputStickerSet
{
    public const CONSTRUCTOR_ID = 0xc88b3b02;
    
    public string $predicate = 'inputStickerSetPremiumGifts';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID

        return new self();
    }
}