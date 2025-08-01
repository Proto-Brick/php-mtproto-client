<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/contacts.ContactBirthdays
 */
abstract class AbstractContactBirthdays extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ContactBirthdays::CONSTRUCTOR_ID => ContactBirthdays::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type contacts.ContactBirthdays: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}