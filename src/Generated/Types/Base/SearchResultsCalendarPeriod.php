<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/searchResultsCalendarPeriod
 */
final class SearchResultsCalendarPeriod extends AbstractSearchResultsCalendarPeriod
{
    public const CONSTRUCTOR_ID = 3383776159;
    
    public string $_ = 'searchResultsCalendarPeriod';
    
    /**
     * @param int $date
     * @param int $minMsgId
     * @param int $maxMsgId
     * @param int $count
     */
    public function __construct(
        public readonly int $date,
        public readonly int $minMsgId,
        public readonly int $maxMsgId,
        public readonly int $count
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->minMsgId);
        $buffer .= $serializer->int32($this->maxMsgId);
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $date = $deserializer->int32($stream);
        $minMsgId = $deserializer->int32($stream);
        $maxMsgId = $deserializer->int32($stream);
        $count = $deserializer->int32($stream);
            return new self(
            $date,
            $minMsgId,
            $maxMsgId,
            $count
        );
    }
}