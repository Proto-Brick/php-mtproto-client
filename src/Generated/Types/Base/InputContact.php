<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPhoneContact
 */
final class InputContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf392b7f4;
    
    public string $predicate = 'inputPhoneContact';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->clientId);
        $buffer .= Serializer::bytes($this->phone);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $clientId = Deserializer::int64($stream);
        $phone = Deserializer::bytes($stream);
        $firstName = Deserializer::bytes($stream);
        $lastName = Deserializer::bytes($stream);

        return new self(
            $clientId,
            $phone,
            $firstName,
            $lastName
        );
    }
}