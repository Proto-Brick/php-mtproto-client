<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockRelatedArticles
 */
final class PageBlockRelatedArticles extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x16115a96;
    
    public string $_ = 'pageBlockRelatedArticles';
    
    /**
     * @param AbstractRichText $title
     * @param list<PageRelatedArticle> $articles
     */
    public function __construct(
        public readonly AbstractRichText $title,
        public readonly array $articles
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->title->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->articles);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = AbstractRichText::deserialize($deserializer, $stream);
        $articles = $deserializer->vectorOfObjects($stream, [PageRelatedArticle::class, 'deserialize']);
        return new self(
            $title,
            $articles
        );
    }
}