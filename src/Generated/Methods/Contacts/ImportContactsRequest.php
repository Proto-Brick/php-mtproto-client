<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputContact;
use DigitalStars\MtprotoClient\Generated\Types\Contacts\ImportedContacts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.importContacts
 */
final class ImportContactsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2c800be5;
    
    public string $_ = 'contacts.importContacts';
    
    public function getMethodName(): string
    {
        return 'contacts.importContacts';
    }
    
    public function getResponseClass(): string
    {
        return ImportedContacts::class;
    }
    /**
     * @param list<InputContact> $contacts
     */
    public function __construct(
        public readonly array $contacts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->contacts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}