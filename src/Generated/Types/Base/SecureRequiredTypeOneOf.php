<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureRequiredTypeOneOf
 */
final class SecureRequiredTypeOneOf extends AbstractSecureRequiredType
{
    public const CONSTRUCTOR_ID = 0x27477b4;
    
    public string $predicate = 'secureRequiredTypeOneOf';
    
    /**
     * @param list<AbstractSecureRequiredType> $types
     */
    public function __construct(
        public readonly array $types
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->types);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $types = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractSecureRequiredType::class, 'deserialize']);

        return new self(
            $types
        );
    }
}