<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photoSizeProgressive
 */
final class PhotoSizeProgressive extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 4198431637;
    
    public string $_ = 'photoSizeProgressive';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param list<int> $sizes
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly array $sizes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->int32($this->w);
        $buffer .= $serializer->int32($this->h);
        $buffer .= $serializer->vectorOfInts($this->sizes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = $deserializer->bytes($stream);
        $w = $deserializer->int32($stream);
        $h = $deserializer->int32($stream);
        $sizes = $deserializer->vectorOfInts($stream);
            return new self(
            $type,
            $w,
            $h,
            $sizes
        );
    }
}