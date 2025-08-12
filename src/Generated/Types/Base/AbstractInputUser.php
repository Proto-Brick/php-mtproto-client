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
            InputUserEmpty::CONSTRUCTOR_ID => InputUserEmpty::deserialize($stream),
            InputUserSelf::CONSTRUCTOR_ID => InputUserSelf::deserialize($stream),
            InputUser::CONSTRUCTOR_ID => InputUser::deserialize($stream),
            InputUserFromMessage::CONSTRUCTOR_ID => InputUserFromMessage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputUser. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}