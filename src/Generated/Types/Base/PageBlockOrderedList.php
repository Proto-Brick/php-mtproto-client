<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockOrderedList
 */
final class PageBlockOrderedList extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 2592793057;
    
    public string $_ = 'pageBlockOrderedList';
    
    /**
     * @param list<AbstractPageListOrderedItem> $items
     */
    public function __construct(
        public readonly array $items
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->items);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $items = $deserializer->vectorOfObjects($stream, [AbstractPageListOrderedItem::class, 'deserialize']);
            return new self(
            $items
        );
    }
}