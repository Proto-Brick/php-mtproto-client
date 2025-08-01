<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photoSize
 */
final class PhotoSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 1976012384;
    
    public string $_ = 'photoSize';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param int $size
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly int $size
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->int32($this->w);
        $buffer .= $serializer->int32($this->h);
        $buffer .= $serializer->int32($this->size);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = $deserializer->bytes($stream);
        $w = $deserializer->int32($stream);
        $h = $deserializer->int32($stream);
        $size = $deserializer->int32($stream);
            return new self(
            $type,
            $w,
            $h,
            $size
        );
    }
}