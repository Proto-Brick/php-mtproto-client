<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->bordered) $flags |= (1 << 0);
        if ($this->striped) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->title->serialize();
        $buffer .= Serializer::vectorOfObjects($this->rows);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $bordered = ($flags & (1 << 0)) ? true : null;
        $striped = ($flags & (1 << 1)) ? true : null;
        $title = AbstractRichText::deserialize($stream);
        $rows = Deserializer::vectorOfObjects($stream, [PageTableRow::class, 'deserialize']);

        return new self(
            $title,
            $rows,
            $bordered,
            $striped
        );
    }
}