<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageListItemBlocks
 */
final class PageListItemBlocks extends AbstractPageListItem
{
    public const CONSTRUCTOR_ID = 635466748;
    
    public string $_ = 'pageListItemBlocks';
    
    /**
     * @param list<AbstractPageBlock> $blocks
     */
    public function __construct(
        public readonly array $blocks
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->blocks);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $blocks = $deserializer->vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
            return new self(
            $blocks
        );
    }
}