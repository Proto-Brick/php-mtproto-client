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
            0x6c37c15c => DocumentAttributeImageSize::deserialize($stream),
            0x11b58939 => DocumentAttributeAnimated::deserialize($stream),
            0x6319d612 => DocumentAttributeSticker::deserialize($stream),
            0x43c57c48 => DocumentAttributeVideo::deserialize($stream),
            0x9852f9c6 => DocumentAttributeAudio::deserialize($stream),
            0x15590068 => DocumentAttributeFilename::deserialize($stream),
            0x9801d2f7 => DocumentAttributeHasStickers::deserialize($stream),
            0xfd149899 => DocumentAttributeCustomEmoji::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type DocumentAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}