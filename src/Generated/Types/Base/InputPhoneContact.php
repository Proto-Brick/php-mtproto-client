<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPhoneContact
 */
final class InputPhoneContact extends AbstractInputContact
{
    public const CONSTRUCTOR_ID = 4086478836;
    
    public string $_ = 'inputPhoneContact';
    
    /**
     * @param int $clientId
     * @param string $phone
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        public readonly int $clientId,
        public readonly string $phone,
        public readonly string $firstName,
        public readonly string $lastName
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->clientId);
        $buffer .= $serializer->bytes($this->phone);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $clientId = $deserializer->int64($stream);
        $phone = $deserializer->bytes($stream);
        $firstName = $deserializer->bytes($stream);
        $lastName = $deserializer->bytes($stream);
            return new self(
            $clientId,
            $phone,
            $firstName,
            $lastName
        );
    }
}