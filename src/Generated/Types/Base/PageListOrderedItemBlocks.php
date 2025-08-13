<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageListOrderedItemBlocks
 */
final class PageListOrderedItemBlocks extends AbstractPageListOrderedItem
{
    public const CONSTRUCTOR_ID = 0x98dd8936;
    
    public string $predicate = 'pageListOrderedItemBlocks';
    
    /**
     * @param string $num
     * @param list<AbstractPageBlock> $blocks
     */
    public function __construct(
        public readonly string $num,
        public readonly array $blocks
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->num);
        $buffer .= Serializer::vectorOfObjects($this->blocks);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $num = Deserializer::bytes($stream);
        $blocks = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);

        return new self(
            $num,
            $blocks
        );
    }
}