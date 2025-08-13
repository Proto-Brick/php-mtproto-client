<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputUser
 */
abstract class AbstractInputUser extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xb98886cf => InputUserEmpty::deserialize($stream),
            0xf7c1b13f => InputUserSelf::deserialize($stream),
            0xf21158c6 => InputUser::deserialize($stream),
            0x1da448e2 => InputUserFromMessage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputUser. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}