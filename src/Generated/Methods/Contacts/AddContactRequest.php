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
    
    public string $_ = 'contacts.addContact';
    
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
     * @param bool|null $addPhonePrivacyException
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $phone,
        public readonly ?bool $addPhonePrivacyException = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->addPhonePrivacyException) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->id->serialize($serializer);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        $buffer .= $serializer->bytes($this->phone);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}