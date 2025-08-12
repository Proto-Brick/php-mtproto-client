<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\Contact;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $contacts = Deserializer::vectorOfObjects($stream, [Contact::class, 'deserialize']);
        $savedCount = Deserializer::int32($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $contacts,
            $savedCount,
            $users
        );
    }
}