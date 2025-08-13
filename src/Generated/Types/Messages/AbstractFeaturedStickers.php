<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/messages.FeaturedStickers
 */
abstract class AbstractFeaturedStickers extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xc6dc0c66 => FeaturedStickersNotModified::deserialize($stream),
            0xbe382906 => FeaturedStickers::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type messages.FeaturedStickers. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}