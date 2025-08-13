<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/savedPhoneContact
 */
final class SavedContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1142bd56;
    
    public string $predicate = 'savedPhoneContact';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phone);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $phone = Deserializer::bytes($stream);
        $firstName = Deserializer::bytes($stream);
        $lastName = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $phone,
            $firstName,
            $lastName,
            $date
        );
    }
}