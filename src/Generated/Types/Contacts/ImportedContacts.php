<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ImportedContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PopularContact;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/contacts.importedContacts
 */
final class ImportedContacts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77d01c3b;
    
    public string $predicate = 'contacts.importedContacts';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $imported = Deserializer::vectorOfObjects($__payload, $__offset, [ImportedContact::class, 'deserialize']);
        $popularInvites = Deserializer::vectorOfObjects($__payload, $__offset, [PopularContact::class, 'deserialize']);
        $retryContacts = Deserializer::vectorOfLongs($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $imported,
            $popularInvites,
            $retryContacts,
            $users
        );
    }
}