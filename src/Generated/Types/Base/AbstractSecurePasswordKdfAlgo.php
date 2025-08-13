<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/SecurePasswordKdfAlgo
 */
abstract class AbstractSecurePasswordKdfAlgo extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x4a8537 => SecurePasswordKdfAlgoUnknown::deserialize($stream),
            0xbbf2dda0 => SecurePasswordKdfAlgoPBKDF2HMACSHA512iter100000::deserialize($stream),
            0x86471d92 => SecurePasswordKdfAlgoSHA512::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type SecurePasswordKdfAlgo. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}