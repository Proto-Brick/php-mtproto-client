<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockEmbedPost
 */
final class PageBlockEmbedPost extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xf259a80b;
    
    public string $_ = 'pageBlockEmbedPost';
    
    /**
     * @param string $url
     * @param int $webpageId
     * @param int $authorPhotoId
     * @param string $author
     * @param int $date
     * @param list<AbstractPageBlock> $blocks
     * @param PageCaption $caption
     */
    public function __construct(
        public readonly string $url,
        public readonly int $webpageId,
        public readonly int $authorPhotoId,
        public readonly string $author,
        public readonly int $date,
        public readonly array $blocks,
        public readonly PageCaption $caption
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->webpageId);
        $buffer .= $serializer->int64($this->authorPhotoId);
        $buffer .= $serializer->bytes($this->author);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->vectorOfObjects($this->blocks);
        $buffer .= $this->caption->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $webpageId = $deserializer->int64($stream);
        $authorPhotoId = $deserializer->int64($stream);
        $author = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
        $blocks = $deserializer->vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $caption = PageCaption::deserialize($deserializer, $stream);
        return new self(
            $url,
            $webpageId,
            $authorPhotoId,
            $author,
            $date,
            $blocks,
            $caption
        );
    }
}