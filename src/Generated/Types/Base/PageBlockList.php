<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockList
 */
final class PageBlockList extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 3840442385;
    
    public string $_ = 'pageBlockList';
    
    /**
     * @param list<AbstractPageListItem> $items
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
        $items = $deserializer->vectorOfObjects($stream, [AbstractPageListItem::class, 'deserialize']);
            return new self(
            $items
        );
    }
}