<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSearchResultsPosition;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchResultsPositions
 */
final class SearchResultsPositions extends AbstractSearchResultsPositions
{
    public const CONSTRUCTOR_ID = 1404185519;
    
    public string $_ = 'messages.searchResultsPositions';
    
    /**
     * @param int $count
     * @param list<AbstractSearchResultsPosition> $positions
     */
    public function __construct(
        public readonly int $count,
        public readonly array $positions
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->positions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $count = $deserializer->int32($stream);
        $positions = $deserializer->vectorOfObjects($stream, [AbstractSearchResultsPosition::class, 'deserialize']);
            return new self(
            $count,
            $positions
        );
    }
}