<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Contacts\AbstractContacts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.getContacts
 */
final class GetContactsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5dd69e12;
    
    public string $predicate = 'contacts.getContacts';
    
    public function getMethodName(): string
    {
        return 'contacts.getContacts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractContacts::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}