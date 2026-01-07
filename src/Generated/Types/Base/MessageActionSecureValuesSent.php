<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSecureValuesSent
 */
final class MessageActionSecureValuesSent extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xd95c6154;
    
    public string $predicate = 'messageActionSecureValuesSent';
    
    /**
     * @param list<SecureValueType> $types
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
        $types = Deserializer::vectorOfObjects($__payload, $__offset, [SecureValueType::class, 'deserialize']);

        return new self(
            $types
        );
    }
}