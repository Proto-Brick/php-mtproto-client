<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageRelatedArticle
 */
final class PageRelatedArticle extends AbstractPageRelatedArticle
{
    public const CONSTRUCTOR_ID = 3012615176;
    
    public string $_ = 'pageRelatedArticle';
    
    /**
     * @param string $url
     * @param int $webpageId
     * @param string|null $title
     * @param string|null $description
     * @param int|null $photoId
     * @param string|null $author
     * @param int|null $publishedDate
     */
    public function __construct(
        public readonly string $url,
        public readonly int $webpageId,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?int $photoId = null,
        public readonly ?string $author = null,
        public readonly ?int $publishedDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->description !== null) $flags |= (1 << 1);
        if ($this->photoId !== null) $flags |= (1 << 2);
        if ($this->author !== null) $flags |= (1 << 3);
        if ($this->publishedDate !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->webpageId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->description);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int64($this->photoId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->author);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->publishedDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $url = $deserializer->bytes($stream);
        $webpageId = $deserializer->int64($stream);
        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $description = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $photoId = ($flags & (1 << 2)) ? $deserializer->int64($stream) : null;
        $author = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $publishedDate = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
            return new self(
            $url,
            $webpageId,
            $title,
            $description,
            $photoId,
            $author,
            $publishedDate
        );
    }
}