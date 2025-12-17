<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->description !== null) {
            $flags |= (1 << 1);
        }
        if ($this->photoId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->author !== null) {
            $flags |= (1 << 3);
        }
        if ($this->publishedDate !== null) {
            $flags |= (1 << 4);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);
        $webpageId = Deserializer::int64($__payload, $__offset);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $description = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photoId = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $author = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $publishedDate = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

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