<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockDetails
 */
final class PageBlockDetails extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x76768bed;
    
    public string $predicate = 'pageBlockDetails';
    
    /**
     * @param list<AbstractPageBlock> $blocks
     * @param AbstractRichText $title
     * @param true|null $open
     */
    public function __construct(
        public readonly array $blocks,
        public readonly AbstractRichText $title,
        public readonly ?true $open = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->open) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->blocks);
        $buffer .= $this->title->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $open = (($flags & (1 << 0)) !== 0) ? true : null;
        $blocks = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPageBlock::class, 'deserialize']);
        $title = AbstractRichText::deserialize($__payload, $__offset);

        return new self(
            $blocks,
            $title,
            $open
        );
    }
}