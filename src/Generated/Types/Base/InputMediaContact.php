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
    
    public string $predicate = 'inputMediaContact';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::bytes($this->vcard);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phoneNumber = Deserializer::bytes($stream);
        $firstName = Deserializer::bytes($stream);
        $lastName = Deserializer::bytes($stream);
        $vcard = Deserializer::bytes($stream);

        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard
        );
    }
}