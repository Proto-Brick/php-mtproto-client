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
    
    public string $_ = 'statsDateRangeDays';
    
    /**
     * @param int $minDate
     * @param int $maxDate
     */
    public function __construct(
        public readonly int $minDate,
        public readonly int $maxDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->minDate);
        $buffer .= $serializer->int32($this->maxDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $minDate = $deserializer->int32($stream);
        $maxDate = $deserializer->int32($stream);
        return new self(
            $minDate,
            $maxDate
        );
    }
}