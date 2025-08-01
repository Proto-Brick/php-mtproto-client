<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageTableRow
 */
final class PageTableRow extends AbstractPageTableRow
{
    public const CONSTRUCTOR_ID = 3770729957;
    
    public string $_ = 'pageTableRow';
    
    /**
     * @param list<AbstractPageTableCell> $cells
     */
    public function __construct(
        public readonly array $cells
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->cells);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $cells = $deserializer->vectorOfObjects($stream, [AbstractPageTableCell::class, 'deserialize']);
            return new self(
            $cells
        );
    }
}