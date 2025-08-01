<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/searchResultPosition
 */
final class SearchResultPosition extends AbstractSearchResultsPosition
{
    public const CONSTRUCTOR_ID = 2137295719;
    
    public string $_ = 'searchResultPosition';
    
    /**
     * @param int $msgId
     * @param int $date
     * @param int $offset
     */
    public function __construct(
        public readonly int $msgId,
        public readonly int $date,
        public readonly int $offset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $msgId = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $offset = $deserializer->int32($stream);
            return new self(
            $msgId,
            $date,
            $offset
        );
    }
}