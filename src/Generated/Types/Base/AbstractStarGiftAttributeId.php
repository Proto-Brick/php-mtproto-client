<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StarGiftAttributeId
 */
abstract class AbstractStarGiftAttributeId extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x48aaae3c => StarGiftAttributeIdModel::deserialize($stream),
            0x4a162433 => StarGiftAttributeIdPattern::deserialize($stream),
            0x1f01c757 => StarGiftAttributeIdBackdrop::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type StarGiftAttributeId. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}