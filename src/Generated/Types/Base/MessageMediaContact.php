<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaContact
 */
final class MessageMediaContact extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x70322949;
    
    public string $_ = 'messageMediaContact';
    
    /**
     * @param string $phoneNumber
     * @param string $firstName
     * @param string $lastName
     * @param string $vcard
     * @param int $userId
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $vcard,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::bytes($this->vcard);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $phoneNumber = Deserializer::bytes($stream);
        $firstName = Deserializer::bytes($stream);
        $lastName = Deserializer::bytes($stream);
        $vcard = Deserializer::bytes($stream);
        $userId = Deserializer::int64($stream);
        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard,
            $userId
        );
    }
}