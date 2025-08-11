<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessAwayMessageScheduleCustom
 */
final class BusinessAwayMessageScheduleCustom extends AbstractBusinessAwayMessageSchedule
{
    public const CONSTRUCTOR_ID = 0xcc4d9ecc;
    
    public string $_ = 'businessAwayMessageScheduleCustom';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $startDate = Deserializer::int32($stream);
        $endDate = Deserializer::int32($stream);
        return new self(
            $startDate,
            $endDate
        );
    }
}