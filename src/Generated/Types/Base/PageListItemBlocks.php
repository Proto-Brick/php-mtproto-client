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
    public const CONSTRUCTOR_ID = 0x25e073fc;
    
    public string $_ = 'pageListItemBlocks';
    
    /**
     * @param list<AbstractPageBlock> $blocks
     */
    public function __construct(
        public readonly array $blocks
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->blocks);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $blocks = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        return new self(
            $blocks
        );
    }
}