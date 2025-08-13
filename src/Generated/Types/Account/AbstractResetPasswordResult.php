<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/account.ResetPasswordResult
 */
abstract class AbstractResetPasswordResult extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xe3779861 => ResetPasswordFailedWait::deserialize($stream),
            0xe9effc7d => ResetPasswordRequestedWait::deserialize($stream),
            0xe926d63e => ResetPasswordOk::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type account.ResetPasswordResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}