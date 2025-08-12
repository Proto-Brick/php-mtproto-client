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
    public const CONSTRUCTOR_ID = 0xe4e88011;
    
    public string $predicate = 'pageBlockList';
    
    /**
     * @param list<AbstractPageListItem> $items
     */
    public function __construct(
        public readonly array $items
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->items);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $items = Deserializer::vectorOfObjects($stream, [AbstractPageListItem::class, 'deserialize']);

        return new self(
            $items
        );
    }
}