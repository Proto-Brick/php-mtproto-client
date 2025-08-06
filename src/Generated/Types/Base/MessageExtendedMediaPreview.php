<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageExtendedMediaPreview
 */
final class MessageExtendedMediaPreview extends AbstractMessageExtendedMedia
{
    public const CONSTRUCTOR_ID = 0xad628cc8;
    
    public string $_ = 'messageExtendedMediaPreview';
    
    /**
     * @param int|null $w
     * @param int|null $h
     * @param AbstractPhotoSize|null $thumb
     * @param int|null $videoDuration
     */
    public function __construct(
        public readonly ?int $w = null,
        public readonly ?int $h = null,
        public readonly ?AbstractPhotoSize $thumb = null,
        public readonly ?int $videoDuration = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->w !== null) $flags |= (1 << 0);
        if ($this->h !== null) $flags |= (1 << 0);
        if ($this->thumb !== null) $flags |= (1 << 1);
        if ($this->videoDuration !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->w);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->h);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->thumb->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->videoDuration);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $w = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $h = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $thumb = ($flags & (1 << 1)) ? AbstractPhotoSize::deserialize($deserializer, $stream) : null;
        $videoDuration = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        return new self(
            $w,
            $h,
            $thumb,
            $videoDuration
        );
    }
}