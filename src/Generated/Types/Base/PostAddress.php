<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/postAddress
 */
final class PostAddress extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1e8caaeb;
    
    public string $predicate = 'postAddress';
    
    /**
     * @param string $streetLine1
     * @param string $streetLine2
     * @param string $city
     * @param string $state
     * @param string $countryIso2
     * @param string $postCode
     */
    public function __construct(
        public readonly string $streetLine1,
        public readonly string $streetLine2,
        public readonly string $city,
        public readonly string $state,
        public readonly string $countryIso2,
        public readonly string $postCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->streetLine1);
        $buffer .= Serializer::bytes($this->streetLine2);
        $buffer .= Serializer::bytes($this->city);
        $buffer .= Serializer::bytes($this->state);
        $buffer .= Serializer::bytes($this->countryIso2);
        $buffer .= Serializer::bytes($this->postCode);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $streetLine1 = Deserializer::bytes($__payload, $__offset);
        $streetLine2 = Deserializer::bytes($__payload, $__offset);
        $city = Deserializer::bytes($__payload, $__offset);
        $state = Deserializer::bytes($__payload, $__offset);
        $countryIso2 = Deserializer::bytes($__payload, $__offset);
        $postCode = Deserializer::bytes($__payload, $__offset);

        return new self(
            $streetLine1,
            $streetLine2,
            $city,
            $state,
            $countryIso2,
            $postCode
        );
    }
}