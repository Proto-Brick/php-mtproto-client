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
    
    public string $predicate = 'messageExtendedMediaPreview';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->w !== null) $flags |= (1 << 0);
        if ($this->h !== null) $flags |= (1 << 0);
        if ($this->thumb !== null) $flags |= (1 << 1);
        if ($this->videoDuration !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->w);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->h);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->thumb->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->videoDuration);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $w = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $h = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $thumb = ($flags & (1 << 1)) ? AbstractPhotoSize::deserialize($stream) : null;
        $videoDuration = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;

        return new self(
            $w,
            $h,
            $thumb,
            $videoDuration
        );
    }
}