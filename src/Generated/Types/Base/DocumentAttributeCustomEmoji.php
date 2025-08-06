<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeCustomEmoji
 */
final class DocumentAttributeCustomEmoji extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0xfd149899;
    
    public string $_ = 'documentAttributeCustomEmoji';
    
    /**
     * @param string $alt
     * @param AbstractInputStickerSet $stickerset
     * @param bool|null $free
     * @param bool|null $textColor
     */
    public function __construct(
        public readonly string $alt,
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?bool $free = null,
        public readonly ?bool $textColor = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->free) $flags |= (1 << 0);
        if ($this->textColor) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->alt);
        $buffer .= $this->stickerset->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $free = ($flags & (1 << 0)) ? true : null;
        $textColor = ($flags & (1 << 1)) ? true : null;
        $alt = $deserializer->bytes($stream);
        $stickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        return new self(
            $alt,
            $stickerset,
            $free,
            $textColor
        );
    }
}