<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/account.ResetPasswordResult
 */
abstract class AbstractResetPasswordResult extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            ResetPasswordFailedWait::CONSTRUCTOR_ID => ResetPasswordFailedWait::deserialize($deserializer, $stream),
            ResetPasswordRequestedWait::CONSTRUCTOR_ID => ResetPasswordRequestedWait::deserialize($deserializer, $stream),
            ResetPasswordOk::CONSTRUCTOR_ID => ResetPasswordOk::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type account.ResetPasswordResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}