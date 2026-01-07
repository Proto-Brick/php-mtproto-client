<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockTable
 */
final class PageBlockTable extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xbf4dea82;
    
    public string $predicate = 'pageBlockTable';
    
    /**
     * @param AbstractRichText $title
     * @param list<PageTableRow> $rows
     * @param true|null $bordered
     * @param true|null $striped
     */
    public function __construct(
        public readonly AbstractRichText $title,
        public readonly array $rows,
        public readonly ?true $bordered = null,
        public readonly ?true $striped = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bordered) {
            $flags |= (1 << 0);
        }
        if ($this->striped) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->title->serialize();
        $buffer .= Serializer::vectorOfObjects($this->rows);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $bordered = (($flags & (1 << 0)) !== 0) ? true : null;
        $striped = (($flags & (1 << 1)) !== 0) ? true : null;
        $title = AbstractRichText::deserialize($__payload, $__offset);
        $rows = Deserializer::vectorOfObjects($__payload, $__offset, [PageTableRow::class, 'deserialize']);

        return new self(
            $title,
            $rows,
            $bordered,
            $striped
        );
    }
}