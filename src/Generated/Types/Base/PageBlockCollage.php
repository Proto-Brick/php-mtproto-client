<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockCollage
 */
final class PageBlockCollage extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x65a0fa4d;
    
    public string $predicate = 'pageBlockCollage';
    
    /**
     * @param list<AbstractPageBlock> $items
     * @param PageCaption $caption
     */
    public function __construct(
        public readonly array $items,
        public readonly PageCaption $caption
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->items);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $items = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $caption = PageCaption::deserialize($stream);

        return new self(
            $items,
            $caption
        );
    }
}