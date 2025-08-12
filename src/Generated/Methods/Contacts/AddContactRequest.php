<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.addContact
 */
final class AddContactRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe8f463d0;
    
    public string $predicate = 'contacts.addContact';
    
    public function getMethodName(): string
    {
        return 'contacts.addContact';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param true|null $addPhonePrivacyException
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $phone,
        public readonly ?true $addPhonePrivacyException = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->addPhonePrivacyException) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::bytes($this->phone);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}