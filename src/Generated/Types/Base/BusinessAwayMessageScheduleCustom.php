<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/businessAwayMessageScheduleCustom
 */
final class BusinessAwayMessageScheduleCustom extends AbstractBusinessAwayMessageSchedule
{
    public const CONSTRUCTOR_ID = 0xcc4d9ecc;
    
    public string $predicate = 'businessAwayMessageScheduleCustom';
    
    /**
     * @param int $startDate
     * @param int $endDate
     */
    public function __construct(
        public readonly int $startDate,
        public readonly int $endDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->startDate);
        $buffer .= Serializer::int32($this->endDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $startDate = Deserializer::int32($__payload, $__offset);
        $endDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $startDate,
            $endDate
        );
    }
}