<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/messages.SavedDialogs
 */
abstract class AbstractSavedDialogs extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xf83ae221 => SavedDialogs::deserialize($stream),
            0x44ba9dd9 => SavedDialogsSlice::deserialize($stream),
            0xc01f6fe8 => SavedDialogsNotModified::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type messages.SavedDialogs. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}