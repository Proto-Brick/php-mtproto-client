<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $items = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPageListItem::class, 'deserialize']);

        return new self(
            $items
        );
    }
}