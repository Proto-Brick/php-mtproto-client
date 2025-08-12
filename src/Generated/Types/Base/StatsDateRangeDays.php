<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $minDate = Deserializer::int32($stream);
        $maxDate = Deserializer::int32($stream);

        return new self(
            $minDate,
            $maxDate
        );
    }
}