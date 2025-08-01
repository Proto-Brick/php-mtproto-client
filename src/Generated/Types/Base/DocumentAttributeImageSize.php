<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeImageSize
 */
final class DocumentAttributeImageSize extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 1815593308;
    
    public string $_ = 'documentAttributeImageSize';
    
    /**
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->w);
        $buffer .= $serializer->int32($this->h);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $w = $deserializer->int32($stream);
        $h = $deserializer->int32($stream);
            return new self(
            $w,
            $h
        );
    }
}