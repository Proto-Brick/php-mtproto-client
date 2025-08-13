<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Users;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/users.Users
 */
abstract class AbstractUsers extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            Users::CONSTRUCTOR_ID => Users::deserialize($stream),
            UsersSlice::CONSTRUCTOR_ID => UsersSlice::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type users.Users. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}