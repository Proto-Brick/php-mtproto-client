<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/account.WebAuthorizations
 */
abstract class AbstractWebAuthorizations extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            WebAuthorizations::CONSTRUCTOR_ID => WebAuthorizations::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type account.WebAuthorizations: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}