<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/searchResultsCalendarPeriod
 */
final class SearchResultsCalendarPeriod extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc9b0539f;
    
    public string $predicate = 'searchResultsCalendarPeriod';
    
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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $minMsgId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $maxMsgId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $date,
            $minMsgId,
            $maxMsgId,
            $count
        );
    }
}