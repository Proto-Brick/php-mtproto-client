<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/UserStatus
 */
abstract class AbstractUserStatus extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            UserStatusEmpty::CONSTRUCTOR_ID => UserStatusEmpty::deserialize($deserializer, $stream),
            UserStatusOnline::CONSTRUCTOR_ID => UserStatusOnline::deserialize($deserializer, $stream),
            UserStatusOffline::CONSTRUCTOR_ID => UserStatusOffline::deserialize($deserializer, $stream),
            UserStatusRecently::CONSTRUCTOR_ID => UserStatusRecently::deserialize($deserializer, $stream),
            UserStatusLastWeek::CONSTRUCTOR_ID => UserStatusLastWeek::deserialize($deserializer, $stream),
            UserStatusLastMonth::CONSTRUCTOR_ID => UserStatusLastMonth::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type UserStatus. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}