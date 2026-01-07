<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/DocumentAttribute
 */
abstract class AbstractDocumentAttribute extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x6c37c15c => DocumentAttributeImageSize::deserialize($__payload, $__offset),
            0x11b58939 => DocumentAttributeAnimated::deserialize($__payload, $__offset),
            0x6319d612 => DocumentAttributeSticker::deserialize($__payload, $__offset),
            0x43c57c48 => DocumentAttributeVideo::deserialize($__payload, $__offset),
            0x9852f9c6 => DocumentAttributeAudio::deserialize($__payload, $__offset),
            0x15590068 => DocumentAttributeFilename::deserialize($__payload, $__offset),
            0x9801d2f7 => DocumentAttributeHasStickers::deserialize($__payload, $__offset),
            0xfd149899 => DocumentAttributeCustomEmoji::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type DocumentAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}