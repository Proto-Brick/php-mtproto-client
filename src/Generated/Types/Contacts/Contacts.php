<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Contact;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/contacts.contacts
 */
final class Contacts extends AbstractContacts
{
    public const CONSTRUCTOR_ID = 0xeae87e42;
    
    public string $predicate = 'contacts.contacts';
    
    /**
     * @param list<Contact> $contacts
     * @param int $savedCount
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $contacts,
        public readonly int $savedCount,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->contacts);
        $buffer .= Serializer::int32($this->savedCount);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $contacts = Deserializer::vectorOfObjects($__payload, $__offset, [Contact::class, 'deserialize']);
        $savedCount = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $contacts,
            $savedCount,
            $users
        );
    }
}