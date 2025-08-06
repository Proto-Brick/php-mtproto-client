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
    
    public string $_ = 'contacts.contacts';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->contacts);
        $buffer .= $serializer->int32($this->savedCount);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $contacts = $deserializer->vectorOfObjects($stream, [Contact::class, 'deserialize']);
        $savedCount = $deserializer->int32($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $contacts,
            $savedCount,
            $users
        );
    }
}