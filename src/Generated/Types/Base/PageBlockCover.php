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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $cover = AbstractPageBlock::deserialize($stream);

        return new self(
            $cover
        );
    }
}