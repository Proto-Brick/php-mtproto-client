<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockPhoto
 */
final class PageBlockPhoto extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 391759200;
    
    public string $_ = 'pageBlockPhoto';
    
    /**
     * @param int $photoId
     * @param AbstractPageCaption $caption
     * @param string|null $url
     * @param int|null $webpageId
     */
    public function __construct(
        public readonly int $photoId,
        public readonly AbstractPageCaption $caption,
        public readonly ?string $url = null,
        public readonly ?int $webpageId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->url !== null) $flags |= (1 << 0);
        if ($this->webpageId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->photoId);
        $buffer .= $this->caption->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->url);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->webpageId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $photoId = $deserializer->int64($stream);
        $caption = AbstractPageCaption::deserialize($deserializer, $stream);
        $url = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $webpageId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
            return new self(
            $photoId,
            $caption,
            $url,
            $webpageId
        );
    }
}