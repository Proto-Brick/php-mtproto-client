<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockRelatedArticles
 */
final class PageBlockRelatedArticles extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x16115a96;
    
    public string $predicate = 'pageBlockRelatedArticles';
    
    /**
     * @param AbstractRichText $title
     * @param list<PageRelatedArticle> $articles
     */
    public function __construct(
        public readonly AbstractRichText $title,
        public readonly array $articles
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->title->serialize();
        $buffer .= Serializer::vectorOfObjects($this->articles);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $title = AbstractRichText::deserialize($__payload, $__offset);
        $articles = Deserializer::vectorOfObjects($__payload, $__offset, [PageRelatedArticle::class, 'deserialize']);

        return new self(
            $title,
            $articles
        );
    }
}