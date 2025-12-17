<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockCover
 */
final class PageBlockCover extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x39f23300;
    
    public string $predicate = 'pageBlockCover';
    
    /**
     * @param AbstractPageBlock $cover
     */
    public function __construct(
        public readonly AbstractPageBlock $cover
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->cover->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $cover = AbstractPageBlock::deserialize($__payload, $__offset);

        return new self(
            $cover
        );
    }
}