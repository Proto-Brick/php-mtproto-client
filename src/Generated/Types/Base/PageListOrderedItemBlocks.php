<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageListOrderedItemBlocks
 */
final class PageListOrderedItemBlocks extends AbstractPageListOrderedItem
{
    public const CONSTRUCTOR_ID = 0x98dd8936;
    
    public string $_ = 'pageListOrderedItemBlocks';
    
    /**
     * @param string $num
     * @param list<AbstractPageBlock> $blocks
     */
    public function __construct(
        public readonly string $num,
        public readonly array $blocks
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->num);
        $buffer .= $serializer->vectorOfObjects($this->blocks);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $num = $deserializer->bytes($stream);
        $blocks = $deserializer->vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        return new self(
            $num,
            $blocks
        );
    }
}