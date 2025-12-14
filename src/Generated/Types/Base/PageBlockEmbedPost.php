<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockEmbedPost
 */
final class PageBlockEmbedPost extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xf259a80b;
    
    public string $predicate = 'pageBlockEmbedPost';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->webpageId);
        $buffer .= Serializer::int64($this->authorPhotoId);
        $buffer .= Serializer::bytes($this->author);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::vectorOfObjects($this->blocks);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $webpageId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $authorPhotoId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $author = Deserializer::bytes($stream);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $blocks = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $caption = PageCaption::deserialize($stream);

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