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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->imported);
        $buffer .= Serializer::vectorOfObjects($this->popularInvites);
        $buffer .= Serializer::vectorOfLongs($this->retryContacts);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $imported = Deserializer::vectorOfObjects($stream, [ImportedContact::class, 'deserialize']);
        $popularInvites = Deserializer::vectorOfObjects($stream, [PopularContact::class, 'deserialize']);
        $retryContacts = Deserializer::vectorOfLongs($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $imported,
            $popularInvites,
            $retryContacts,
            $users
        );
    }
}