<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/contacts.Blocked
 */
abstract class AbstractBlocked extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xade1591 => Blocked::deserialize($stream),
            0xe1664194 => BlockedSlice::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type contacts.Blocked. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}