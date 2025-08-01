<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/WebPageAttribute
 */
abstract class AbstractWebPageAttribute extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            WebPageAttributeTheme::CONSTRUCTOR_ID => WebPageAttributeTheme::deserialize($deserializer, $stream),
            WebPageAttributeStory::CONSTRUCTOR_ID => WebPageAttributeStory::deserialize($deserializer, $stream),
            WebPageAttributeStickerSet::CONSTRUCTOR_ID => WebPageAttributeStickerSet::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type WebPageAttribute: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}