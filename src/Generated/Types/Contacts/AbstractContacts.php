<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/contacts.Contacts
 */
abstract class AbstractContacts extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ContactsNotModified::CONSTRUCTOR_ID => ContactsNotModified::deserialize($deserializer, $stream),
            Contacts::CONSTRUCTOR_ID => Contacts::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type contacts.Contacts: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}