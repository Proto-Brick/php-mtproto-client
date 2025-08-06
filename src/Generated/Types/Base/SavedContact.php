<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/savedPhoneContact
 */
final class SavedContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1142bd56;
    
    public string $_ = 'savedPhoneContact';
    
    /**
     * @param string $phone
     * @param string $firstName
     * @param string $lastName
     * @param int $date
     */
    public function __construct(
        public readonly string $phone,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phone);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $phone = $deserializer->bytes($stream);
        $firstName = $deserializer->bytes($stream);
        $lastName = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $phone,
            $firstName,
            $lastName,
            $date
        );
    }
}