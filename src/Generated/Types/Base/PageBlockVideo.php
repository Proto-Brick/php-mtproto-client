<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockVideo
 */
final class PageBlockVideo extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x7c8fe7b6;
    
    public string $_ = 'pageBlockVideo';
    
    /**
     * @param int $videoId
     * @param PageCaption $caption
     * @param bool|null $autoplay
     * @param bool|null $loop
     */
    public function __construct(
        public readonly int $videoId,
        public readonly PageCaption $caption,
        public readonly ?bool $autoplay = null,
        public readonly ?bool $loop = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autoplay) $flags |= (1 << 0);
        if ($this->loop) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->videoId);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $autoplay = ($flags & (1 << 0)) ? true : null;
        $loop = ($flags & (1 << 1)) ? true : null;
        $videoId = Deserializer::int64($stream);
        $caption = PageCaption::deserialize($stream);
        return new self(
            $videoId,
            $caption,
            $autoplay,
            $loop
        );
    }
}