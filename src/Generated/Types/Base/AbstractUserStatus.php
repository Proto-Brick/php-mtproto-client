<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/UserStatus
 */
abstract class AbstractUserStatus extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x9d05049 => UserStatusEmpty::deserialize($stream),
            0xedb93949 => UserStatusOnline::deserialize($stream),
            0x8c703f => UserStatusOffline::deserialize($stream),
            0x7b197dc8 => UserStatusRecently::deserialize($stream),
            0x541a1d1a => UserStatusLastWeek::deserialize($stream),
            0x65899777 => UserStatusLastMonth::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type UserStatus. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}