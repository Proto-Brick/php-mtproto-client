<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputUser
 */
abstract class AbstractInputUser extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputUserEmpty::CONSTRUCTOR_ID => InputUserEmpty::deserialize($deserializer, $stream),
            InputUserSelf::CONSTRUCTOR_ID => InputUserSelf::deserialize($deserializer, $stream),
            InputUser::CONSTRUCTOR_ID => InputUser::deserialize($deserializer, $stream),
            InputUserFromMessage::CONSTRUCTOR_ID => InputUserFromMessage::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputUser: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}