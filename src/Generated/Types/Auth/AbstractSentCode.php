<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/auth.SentCode
 */
abstract class AbstractSentCode extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x5e002502 => SentCode::deserialize($stream),
            0x2390fe44 => SentCodeSuccess::deserialize($stream),
            0xd7cef980 => SentCodePaymentRequired::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type auth.SentCode. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}