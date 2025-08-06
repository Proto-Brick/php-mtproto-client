<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\ImportedContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\PopularContact;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contacts.importedContacts
 */
final class ImportedContacts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77d01c3b;
    
    public string $_ = 'contacts.importedContacts';
    
    /**
     * @param list<ImportedContact> $imported
     * @param list<PopularContact> $popularInvites
     * @param list<int> $retryContacts
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $imported,
        public readonly array $popularInvites,
        public readonly array $retryContacts,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->imported);
        $buffer .= $serializer->vectorOfObjects($this->popularInvites);
        $buffer .= $serializer->vectorOfLongs($this->retryContacts);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $imported = $deserializer->vectorOfObjects($stream, [ImportedContact::class, 'deserialize']);
        $popularInvites = $deserializer->vectorOfObjects($stream, [PopularContact::class, 'deserialize']);
        $retryContacts = $deserializer->vectorOfLongs($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $imported,
            $popularInvites,
            $retryContacts,
            $users
        );
    }
}