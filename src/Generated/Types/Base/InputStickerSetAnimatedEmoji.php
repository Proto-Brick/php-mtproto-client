<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickerSetAnimatedEmoji
 */
final class InputStickerSetAnimatedEmoji extends AbstractInputStickerSet
{
    public const CONSTRUCTOR_ID = 0x28703c8;
    
    public string $predicate = 'inputStickerSetAnimatedEmoji';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}