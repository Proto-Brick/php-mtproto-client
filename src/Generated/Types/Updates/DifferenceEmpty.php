<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.differenceEmpty
 */
final class DifferenceEmpty extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0x5d75a138;
    
    public string $predicate = 'updates.differenceEmpty';
    
    /**
     * @param int $date
     * @param int $seq
     */
    public function __construct(
        public readonly int $date,
        public readonly int $seq
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seq);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $date = Deserializer::int32($__payload, $__offset);
        $seq = Deserializer::int32($__payload, $__offset);

        return new self(
            $date,
            $seq
        );
    }
}