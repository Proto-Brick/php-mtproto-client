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
    public const CONSTRUCTOR_ID = 2089805750;
    
    public string $_ = 'pageBlockVideo';
    
    /**
     * @param int $videoId
     * @param AbstractPageCaption $caption
     * @param bool|null $autoplay
     * @param bool|null $loop
     */
    public function __construct(
        public readonly int $videoId,
        public readonly AbstractPageCaption $caption,
        public readonly ?bool $autoplay = null,
        public readonly ?bool $loop = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autoplay) $flags |= (1 << 0);
        if ($this->loop) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->videoId);
        $buffer .= $this->caption->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $autoplay = ($flags & (1 << 0)) ? true : null;
        $loop = ($flags & (1 << 1)) ? true : null;
        $videoId = $deserializer->int64($stream);
        $caption = AbstractPageCaption::deserialize($deserializer, $stream);
            return new self(
            $videoId,
            $caption,
            $autoplay,
            $loop
        );
    }
}