<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/PasswordKdfAlgo
 */
abstract class AbstractPasswordKdfAlgo extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xd45ab096 => PasswordKdfAlgoUnknown::deserialize($stream),
            0x3a912d4a => PasswordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PasswordKdfAlgo. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}