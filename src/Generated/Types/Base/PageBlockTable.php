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
    public const CONSTRUCTOR_ID = 3209554562;
    
    public string $_ = 'pageBlockTable';
    
    /**
     * @param AbstractRichText $title
     * @param list<AbstractPageTableRow> $rows
     * @param bool|null $bordered
     * @param bool|null $striped
     */
    public function __construct(
        public readonly AbstractRichText $title,
        public readonly array $rows,
        public readonly ?bool $bordered = null,
        public readonly ?bool $striped = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bordered) $flags |= (1 << 0);
        if ($this->striped) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->title->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->rows);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $bordered = ($flags & (1 << 0)) ? true : null;
        $striped = ($flags & (1 << 1)) ? true : null;
        $title = AbstractRichText::deserialize($deserializer, $stream);
        $rows = $deserializer->vectorOfObjects($stream, [AbstractPageTableRow::class, 'deserialize']);
            return new self(
            $title,
            $rows,
            $bordered,
            $striped
        );
    }
}