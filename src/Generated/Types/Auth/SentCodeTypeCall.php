<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeCall
 */
final class SentCodeTypeCall extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0x5353e5a7;
    
    public string $predicate = 'auth.sentCodeTypeCall';
    
    /**
     * @param int $length
     */
    public function __construct(
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $length = Deserializer::int32($__payload, $__offset);

        return new self(
            $length
        );
    }
}