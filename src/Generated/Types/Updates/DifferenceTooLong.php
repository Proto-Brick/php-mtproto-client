<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.differenceTooLong
 */
final class DifferenceTooLong extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0x4afe8f6d;
    
    public string $predicate = 'updates.differenceTooLong';
    
    /**
     * @param int $pts
     */
    public function __construct(
        public readonly int $pts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $pts = Deserializer::int32($__payload, $__offset);

        return new self(
            $pts
        );
    }
}