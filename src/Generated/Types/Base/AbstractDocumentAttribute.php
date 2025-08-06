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
        
        return match ($constructorId) {
            DocumentAttributeImageSize::CONSTRUCTOR_ID => DocumentAttributeImageSize::deserialize($deserializer, $stream),
            DocumentAttributeAnimated::CONSTRUCTOR_ID => DocumentAttributeAnimated::deserialize($deserializer, $stream),
            DocumentAttributeSticker::CONSTRUCTOR_ID => DocumentAttributeSticker::deserialize($deserializer, $stream),
            DocumentAttributeVideo::CONSTRUCTOR_ID => DocumentAttributeVideo::deserialize($deserializer, $stream),
            DocumentAttributeAudio::CONSTRUCTOR_ID => DocumentAttributeAudio::deserialize($deserializer, $stream),
            DocumentAttributeFilename::CONSTRUCTOR_ID => DocumentAttributeFilename::deserialize($deserializer, $stream),
            DocumentAttributeHasStickers::CONSTRUCTOR_ID => DocumentAttributeHasStickers::deserialize($deserializer, $stream),
            DocumentAttributeCustomEmoji::CONSTRUCTOR_ID => DocumentAttributeCustomEmoji::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type DocumentAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}