<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockOrderedList
 */
final class PageBlockOrderedList extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x9a8ae1e1;
    
    public string $predicate = 'pageBlockOrderedList';
    
    /**
     * @param list<AbstractPageListOrderedItem> $items
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $items = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPageListOrderedItem::class, 'deserialize']);

        return new self(
            $items
        );
    }
}