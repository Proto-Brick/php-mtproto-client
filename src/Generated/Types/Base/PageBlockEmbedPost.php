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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $url = Deserializer::bytes($stream);
        $webpageId = Deserializer::int64($stream);
        $authorPhotoId = Deserializer::int64($stream);
        $author = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);
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