<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockVideo
 */
final class PageBlockVideo extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x7c8fe7b6;
    
    public string $predicate = 'pageBlockVideo';
    
    /**
     * @param int $videoId
     * @param PageCaption $caption
     * @param true|null $autoplay
     * @param true|null $loop
     */
    public function __construct(
        public readonly int $videoId,
        public readonly PageCaption $caption,
        public readonly ?true $autoplay = null,
        public readonly ?true $loop = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autoplay) {
            $flags |= (1 << 0);
        }
        if ($this->loop) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->videoId);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $autoplay = (($flags & (1 << 0)) !== 0) ? true : null;
        $loop = (($flags & (1 << 1)) !== 0) ? true : null;
        $videoId = Deserializer::int64($__payload, $__offset);
        $caption = PageCaption::deserialize($__payload, $__offset);

        return new self(
            $videoId,
            $caption,
            $autoplay,
            $loop
        );
    }
}