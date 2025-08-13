<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StickerSetCovered
 */
abstract class AbstractStickerSetCovered extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x6410a5d2 => StickerSetCovered::deserialize($stream),
            0x3407e51b => StickerSetMultiCovered::deserialize($stream),
            0x40d13c0e => StickerSetFullCovered::deserialize($stream),
            0x77b15d1c => StickerSetNoCovered::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type StickerSetCovered. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}