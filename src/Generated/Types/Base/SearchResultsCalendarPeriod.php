<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/searchResultsCalendarPeriod
 */
final class SearchResultsCalendarPeriod extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc9b0539f;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->minMsgId);
        $buffer .= Serializer::int32($this->maxMsgId);
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $date = Deserializer::int32($stream);
        $minMsgId = Deserializer::int32($stream);
        $maxMsgId = Deserializer::int32($stream);
        $count = Deserializer::int32($stream);
        return new self(
            $date,
            $minMsgId,
            $maxMsgId,
            $count
        );
    }
}