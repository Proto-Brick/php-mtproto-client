<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\ContactBirthday;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contacts.contactBirthdays
 */
final class ContactBirthdays extends TlObject
{
    public const CONSTRUCTOR_ID = 0x114ff30d;
    
    public string $_ = 'contacts.contactBirthdays';
    
    /**
     * @param list<ContactBirthday> $contacts
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $contacts = $deserializer->vectorOfObjects($stream, [ContactBirthday::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $contacts,
            $users
        );
    }
}