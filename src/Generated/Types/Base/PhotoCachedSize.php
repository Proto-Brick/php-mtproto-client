<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photoCachedSize
 */
final class PhotoCachedSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0x21e1ad6;
    
    public string $_ = 'photoCachedSize';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param string $bytes
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly string $bytes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->int32($this->w);
        $buffer .= $serializer->int32($this->h);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = $deserializer->bytes($stream);
        $w = $deserializer->int32($stream);
        $h = $deserializer->int32($stream);
        $bytes = $deserializer->bytes($stream);
        return new self(
            $type,
            $w,
            $h,
            $bytes
        );
    }
}