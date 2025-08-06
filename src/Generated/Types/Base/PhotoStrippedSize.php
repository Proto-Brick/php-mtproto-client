<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photoStrippedSize
 */
final class PhotoStrippedSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xe0b0bc2e;
    
    public string $_ = 'photoStrippedSize';
    
    /**
     * @param string $type
     * @param string $bytes
     */
    public function __construct(
        public readonly string $type,
        public readonly string $bytes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = $deserializer->bytes($stream);
        $bytes = $deserializer->bytes($stream);
        return new self(
            $type,
            $bytes
        );
    }
}