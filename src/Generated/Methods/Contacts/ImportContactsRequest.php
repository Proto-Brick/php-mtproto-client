<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputContact;
use DigitalStars\MtprotoClient\Generated\Types\Contacts\AbstractImportedContacts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.importContacts
 */
final class ImportContactsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 746589157;
    
    public string $_ = 'contacts.importContacts';
    
    public function getMethodName(): string
    {
        return 'contacts.importContacts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractImportedContacts::class;
    }
    /**
     * @param list<AbstractInputContact> $contacts
     */
    public function __construct(
        public readonly array $contacts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->contacts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}