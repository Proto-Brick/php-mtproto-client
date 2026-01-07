<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/StickerSetCovered
 */
abstract class AbstractStickerSetCovered extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x6410a5d2 => StickerSetCovered::deserialize($__payload, $__offset),
            0x3407e51b => StickerSetMultiCovered::deserialize($__payload, $__offset),
            0x40d13c0e => StickerSetFullCovered::deserialize($__payload, $__offset),
            0x77b15d1c => StickerSetNoCovered::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type StickerSetCovered. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}