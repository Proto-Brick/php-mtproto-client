<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMessageReplyTo
 */
final class InputMessageReplyTo extends AbstractInputMessage
{
    public const CONSTRUCTOR_ID = 0xbad88395;
    
    public string $predicate = 'inputMessageReplyTo';
    
    /**
     * @param int $id
     */
    public function __construct(
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int32($__payload, $__offset);

        return new self(
            $id
        );
    }
}