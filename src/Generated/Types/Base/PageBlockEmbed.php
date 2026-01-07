<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockEmbed
 */
final class PageBlockEmbed extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xa8718dc5;
    
    public string $predicate = 'pageBlockEmbed';
    
    /**
     * @param PageCaption $caption
     * @param true|null $fullWidth
     * @param true|null $allowScrolling
     * @param string|null $url
     * @param string|null $html
     * @param int|null $posterPhotoId
     * @param int|null $w
     * @param int|null $h
     */
    public function __construct(
        public readonly PageCaption $caption,
        public readonly ?true $fullWidth = null,
        public readonly ?true $allowScrolling = null,
        public readonly ?string $url = null,
        public readonly ?string $html = null,
        public readonly ?int $posterPhotoId = null,
        public readonly ?int $w = null,
        public readonly ?int $h = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fullWidth) {
            $flags |= (1 << 0);
        }
        if ($this->allowScrolling) {
            $flags |= (1 << 3);
        }
        if ($this->url !== null) {
            $flags |= (1 << 1);
        }
        if ($this->html !== null) {
            $flags |= (1 << 2);
        }
        if ($this->posterPhotoId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->w !== null) {
            $flags |= (1 << 5);
        }
        if ($this->h !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->html);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->posterPhotoId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->w);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->h);
        }
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $fullWidth = (($flags & (1 << 0)) !== 0) ? true : null;
        $allowScrolling = (($flags & (1 << 3)) !== 0) ? true : null;
        $url = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $html = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $posterPhotoId = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $w = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $h = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $caption = PageCaption::deserialize($__payload, $__offset);

        return new self(
            $caption,
            $fullWidth,
            $allowScrolling,
            $url,
            $html,
            $posterPhotoId,
            $w,
            $h
        );
    }
}