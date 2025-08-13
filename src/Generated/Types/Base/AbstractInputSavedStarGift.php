<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputSavedStarGift
 */
abstract class AbstractInputSavedStarGift extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x69279795 => InputSavedStarGiftUser::deserialize($stream),
            0xf101aa7f => InputSavedStarGiftChat::deserialize($stream),
            0x2085c238 => InputSavedStarGiftSlug::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputSavedStarGift. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}