<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageRelatedArticle
 */
final class PageRelatedArticle extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb390dc08;
    
    public string $predicate = 'pageRelatedArticle';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->description !== null) $flags |= (1 << 1);
        if ($this->photoId !== null) $flags |= (1 << 2);
        if ($this->author !== null) $flags |= (1 << 3);
        if ($this->publishedDate !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->webpageId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->description);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->photoId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->author);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->publishedDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $url = Deserializer::bytes($stream);
        $webpageId = Deserializer::int64($stream);
        $title = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $description = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $photoId = ($flags & (1 << 2)) ? Deserializer::int64($stream) : null;
        $author = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $publishedDate = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;

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