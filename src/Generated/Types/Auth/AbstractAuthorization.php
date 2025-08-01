<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.Authorization
 */
abstract class AbstractAuthorization extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            Authorization::CONSTRUCTOR_ID => Authorization::deserialize($deserializer, $stream),
            AuthorizationSignUpRequired::CONSTRUCTOR_ID => AuthorizationSignUpRequired::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type auth.Authorization: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}