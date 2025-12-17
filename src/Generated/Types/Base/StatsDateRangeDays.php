<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsDateRangeDays
 */
final class StatsDateRangeDays extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb637edaf;
    
    public string $predicate = 'statsDateRangeDays';
    
    /**
     * @param int $minDate
     * @param int $maxDate
     */
    public function __construct(
        public readonly int $minDate,
        public readonly int $maxDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->minDate);
        $buffer .= Serializer::int32($this->maxDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $minDate = Deserializer::int32($__payload, $__offset);
        $maxDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $minDate,
            $maxDate
        );
    }
}