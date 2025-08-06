<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StickerSetCovered
 */
abstract class AbstractStickerSetCovered extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            StickerSetCovered::CONSTRUCTOR_ID => StickerSetCovered::deserialize($deserializer, $stream),
            StickerSetMultiCovered::CONSTRUCTOR_ID => StickerSetMultiCovered::deserialize($deserializer, $stream),
            StickerSetFullCovered::CONSTRUCTOR_ID => StickerSetFullCovered::deserialize($deserializer, $stream),
            StickerSetNoCovered::CONSTRUCTOR_ID => StickerSetNoCovered::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type StickerSetCovered. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}