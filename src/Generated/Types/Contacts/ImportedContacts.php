<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractImportedContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPopularContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contacts.importedContacts
 */
final class ImportedContacts extends AbstractImportedContacts
{
    public const CONSTRUCTOR_ID = 2010127419;
    
    public string $_ = 'contacts.importedContacts';
    
    /**
     * @param list<AbstractImportedContact> $imported
     * @param list<AbstractPopularContact> $popularInvites
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $imported = $deserializer->vectorOfObjects($stream, [AbstractImportedContact::class, 'deserialize']);
        $popularInvites = $deserializer->vectorOfObjects($stream, [AbstractPopularContact::class, 'deserialize']);
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