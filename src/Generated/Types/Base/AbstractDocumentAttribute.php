<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/DocumentAttribute
 */
abstract class AbstractDocumentAttribute extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            DocumentAttributeImageSize::CONSTRUCTOR_ID => DocumentAttributeImageSize::deserialize($stream),
            DocumentAttributeAnimated::CONSTRUCTOR_ID => DocumentAttributeAnimated::deserialize($stream),
            DocumentAttributeSticker::CONSTRUCTOR_ID => DocumentAttributeSticker::deserialize($stream),
            DocumentAttributeVideo::CONSTRUCTOR_ID => DocumentAttributeVideo::deserialize($stream),
            DocumentAttributeAudio::CONSTRUCTOR_ID => DocumentAttributeAudio::deserialize($stream),
            DocumentAttributeFilename::CONSTRUCTOR_ID => DocumentAttributeFilename::deserialize($stream),
            DocumentAttributeHasStickers::CONSTRUCTOR_ID => DocumentAttributeHasStickers::deserialize($stream),
            DocumentAttributeCustomEmoji::CONSTRUCTOR_ID => DocumentAttributeCustomEmoji::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type DocumentAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}