<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockPhoto
 */
final class PageBlockPhoto extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x1759c560;
    
    public string $predicate = 'pageBlockPhoto';
    
    /**
     * @param int $photoId
     * @param PageCaption $caption
     * @param string|null $url
     * @param int|null $webpageId
     */
    public function __construct(
        public readonly int $photoId,
        public readonly PageCaption $caption,
        public readonly ?string $url = null,
        public readonly ?int $webpageId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->url !== null) {
            $flags |= (1 << 0);
        }
        if ($this->webpageId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->photoId);
        $buffer .= $this->caption->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->webpageId);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $photoId = Deserializer::int64($stream);
        $caption = PageCaption::deserialize($stream);
        $url = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $webpageId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;

        return new self(
            $photoId,
            $caption,
            $url,
            $webpageId
        );
    }
}