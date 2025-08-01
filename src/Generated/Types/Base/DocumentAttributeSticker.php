<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeSticker
 */
final class DocumentAttributeSticker extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 1662637586;
    
    public string $_ = 'documentAttributeSticker';
    
    /**
     * @param string $alt
     * @param AbstractInputStickerSet $stickerset
     * @param bool|null $mask
     * @param AbstractMaskCoords|null $maskCoords
     */
    public function __construct(
        public readonly string $alt,
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?bool $mask = null,
        public readonly ?AbstractMaskCoords $maskCoords = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->mask) $flags |= (1 << 1);
        if ($this->maskCoords !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->alt);
        $buffer .= $this->stickerset->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->maskCoords->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $mask = ($flags & (1 << 1)) ? true : null;
        $alt = $deserializer->bytes($stream);
        $stickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        $maskCoords = ($flags & (1 << 0)) ? AbstractMaskCoords::deserialize($deserializer, $stream) : null;
            return new self(
            $alt,
            $stickerset,
            $mask,
            $maskCoords
        );
    }
}