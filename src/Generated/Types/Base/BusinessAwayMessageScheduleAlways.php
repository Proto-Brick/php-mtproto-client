<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/businessAwayMessageScheduleAlways
 */
final class BusinessAwayMessageScheduleAlways extends AbstractBusinessAwayMessageSchedule
{
    public const CONSTRUCTOR_ID = 0xc9b9e2b9;
    
    public string $predicate = 'businessAwayMessageScheduleAlways';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}