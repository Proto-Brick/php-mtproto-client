<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaContact
 */
final class MessageMediaContact extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x70322949;
    
    public string $predicate = 'messageMediaContact';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $phoneNumber = Deserializer::bytes($__payload, $__offset);
        $firstName = Deserializer::bytes($__payload, $__offset);
        $lastName = Deserializer::bytes($__payload, $__offset);
        $vcard = Deserializer::bytes($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);

        return new self(
            $phoneNumber,
            $firstName,
            $lastName,
            $vcard,
            $userId
        );
    }
}