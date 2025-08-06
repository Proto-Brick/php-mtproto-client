<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaContact
 */
final class InputMediaContact extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xf8ab7dfb;
    
    public string $_ = 'inputMediaContact';
    
    /**
     * @param string $phoneNumber
     * @param string $firstName
     * @param string $lastName
     * @param string $vcard
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $vcard
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        $buffer .= $serializer->bytes($this->vcard);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $phoneNumber = $deserializer->bytes($stream);
        $firstName = $deserializer->bytes($stream);
        $lastName = $deserializer->bytes($stream);
        $vcard = $deserializer->bytes($stream);
        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard
        );
    }
}