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
    public const CONSTRUCTOR_ID = 0x6c37c15c;
    
    public string $predicate = 'documentAttributeImageSize';
    
    /**
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);

        return new self(
            $w,
            $h
        );
    }
}