<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/DocumentAttribute
 */
abstract class AbstractDocumentAttribute extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            DocumentAttributeImageSize::CONSTRUCTOR_ID => DocumentAttributeImageSize::deserialize($deserializer, $stream),
            DocumentAttributeAnimated::CONSTRUCTOR_ID => DocumentAttributeAnimated::deserialize($deserializer, $stream),
            DocumentAttributeSticker::CONSTRUCTOR_ID => DocumentAttributeSticker::deserialize($deserializer, $stream),
            DocumentAttributeVideo::CONSTRUCTOR_ID => DocumentAttributeVideo::deserialize($deserializer, $stream),
            DocumentAttributeAudio::CONSTRUCTOR_ID => DocumentAttributeAudio::deserialize($deserializer, $stream),
            DocumentAttributeFilename::CONSTRUCTOR_ID => DocumentAttributeFilename::deserialize($deserializer, $stream),
            DocumentAttributeHasStickers::CONSTRUCTOR_ID => DocumentAttributeHasStickers::deserialize($deserializer, $stream),
            DocumentAttributeCustomEmoji::CONSTRUCTOR_ID => DocumentAttributeCustomEmoji::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type DocumentAttribute: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}