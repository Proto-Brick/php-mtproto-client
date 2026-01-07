<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/WebPageAttribute
 */
abstract class AbstractWebPageAttribute extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x54b56617 => WebPageAttributeTheme::deserialize($__payload, $__offset),
            0x2e94c3e7 => WebPageAttributeStory::deserialize($__payload, $__offset),
            0x50cc03d3 => WebPageAttributeStickerSet::deserialize($__payload, $__offset),
            0xcf6f6db8 => WebPageAttributeUniqueStarGift::deserialize($__payload, $__offset),
            0x31cad303 => WebPageAttributeStarGiftCollection::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type WebPageAttribute. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}