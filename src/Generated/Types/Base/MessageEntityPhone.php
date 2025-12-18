<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityPhone
 */
final class MessageEntityPhone extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0x9b69e34b;
    
    public string $predicate = 'messageEntityPhone';
    
    /**
     * @param int $offset
     * @param int $length
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $offset = Deserializer::int32($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);

        return new self(
            $offset,
            $length
        );
    }
}