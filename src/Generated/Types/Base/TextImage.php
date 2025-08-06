<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textImage
 */
final class TextImage extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x81ccf4f;
    
    public string $_ = 'textImage';
    
    /**
     * @param int $documentId
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $documentId,
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->documentId);
        $buffer .= $serializer->int32($this->w);
        $buffer .= $serializer->int32($this->h);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $documentId = $deserializer->int64($stream);
        $w = $deserializer->int32($stream);
        $h = $deserializer->int32($stream);
        return new self(
            $documentId,
            $w,
            $h
        );
    }
}