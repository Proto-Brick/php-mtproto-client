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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $documentId = Deserializer::int64($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        return new self(
            $documentId,
            $w,
            $h
        );
    }
}