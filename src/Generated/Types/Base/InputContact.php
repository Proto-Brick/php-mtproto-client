<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $clientId = Deserializer::int64($__payload, $__offset);
        $phone = Deserializer::bytes($__payload, $__offset);
        $firstName = Deserializer::bytes($__payload, $__offset);
        $lastName = Deserializer::bytes($__payload, $__offset);

        return new self(
            $clientId,
            $phone,
            $firstName,
            $lastName
        );
    }
}