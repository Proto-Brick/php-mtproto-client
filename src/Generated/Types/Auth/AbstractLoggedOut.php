<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.LoggedOut
 */
abstract class AbstractLoggedOut extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            LoggedOut::CONSTRUCTOR_ID => LoggedOut::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type auth.LoggedOut: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}