<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/WebPageAttribute
 */
abstract class AbstractWebPageAttribute extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            WebPageAttributeTheme::CONSTRUCTOR_ID => WebPageAttributeTheme::deserialize($stream),
            WebPageAttributeStory::CONSTRUCTOR_ID => WebPageAttributeStory::deserialize($stream),
            WebPageAttributeStickerSet::CONSTRUCTOR_ID => WebPageAttributeStickerSet::deserialize($stream),
            WebPageAttributeUniqueStarGift::CONSTRUCTOR_ID => WebPageAttributeUniqueStarGift::deserialize($stream),
            WebPageAttributeStarGiftCollection::CONSTRUCTOR_ID => WebPageAttributeStarGiftCollection::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type WebPageAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}