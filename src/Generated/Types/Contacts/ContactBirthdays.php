<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractContactBirthday;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contacts.contactBirthdays
 */
final class ContactBirthdays extends AbstractContactBirthdays
{
    public const CONSTRUCTOR_ID = 290452237;
    
    public string $_ = 'contacts.contactBirthdays';
    
    /**
     * @param list<AbstractContactBirthday> $contacts
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $contacts,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->contacts);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $contacts = $deserializer->vectorOfObjects($stream, [AbstractContactBirthday::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $contacts,
            $users
        );
    }
}