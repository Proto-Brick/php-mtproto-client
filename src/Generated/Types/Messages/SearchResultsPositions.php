<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\SearchResultsPosition;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchResultsPositions
 */
final class SearchResultsPositions extends TlObject
{
    public const CONSTRUCTOR_ID = 0x53b22baf;
    
    public string $_ = 'messages.searchResultsPositions';
    
    /**
     * @param int $count
     * @param list<SearchResultsPosition> $positions
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $count = $deserializer->int32($stream);
        $positions = $deserializer->vectorOfObjects($stream, [SearchResultsPosition::class, 'deserialize']);
        return new self(
            $count,
            $positions
        );
    }
}