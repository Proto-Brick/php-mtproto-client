<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaDice
 */
final class MessageMediaDice extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x3f7ee58b;
    
    public string $predicate = 'messageMediaDice';
    
    /**
     * @param int $value
     * @param string $emoticon
     */
    public function __construct(
        public readonly int $value,
        public readonly string $emoticon
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->value);
        $buffer .= Serializer::bytes($this->emoticon);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $value = Deserializer::int32($__payload, $__offset);
        $emoticon = Deserializer::bytes($__payload, $__offset);

        return new self(
            $value,
            $emoticon
        );
    }
}