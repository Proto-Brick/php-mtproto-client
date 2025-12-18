<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/contacts.contactsNotModified
 */
final class ContactsNotModified extends AbstractContacts
{
    public const CONSTRUCTOR_ID = 0xb74ba9d2;
    
    public string $predicate = 'contacts.contactsNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}