<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StarGiftAttribute
 */
abstract class AbstractStarGiftAttribute extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            StarGiftAttributeModel::CONSTRUCTOR_ID => StarGiftAttributeModel::deserialize($stream),
            StarGiftAttributePattern::CONSTRUCTOR_ID => StarGiftAttributePattern::deserialize($stream),
            StarGiftAttributeBackdrop::CONSTRUCTOR_ID => StarGiftAttributeBackdrop::deserialize($stream),
            StarGiftAttributeOriginalDetails::CONSTRUCTOR_ID => StarGiftAttributeOriginalDetails::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type StarGiftAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}