<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SearchResultsPosition;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.searchResultsPositions
 */
final class SearchResultsPositions extends TlObject
{
    public const CONSTRUCTOR_ID = 0x53b22baf;
    
    public string $predicate = 'messages.searchResultsPositions';
    
    /**
     * @param int $count
     * @param list<SearchResultsPosition> $positions
     */
    public function __construct(
        public readonly int $count,
        public readonly array $positions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->positions);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($stream);
        $positions = Deserializer::vectorOfObjects($stream, [SearchResultsPosition::class, 'deserialize']);

        return new self(
            $count,
            $positions
        );
    }
}