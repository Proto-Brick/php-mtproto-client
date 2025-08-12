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
    public const CONSTRUCTOR_ID = 0x6319d612;
    
    public string $predicate = 'documentAttributeSticker';
    
    /**
     * @param string $alt
     * @param AbstractInputStickerSet $stickerset
     * @param true|null $mask
     * @param MaskCoords|null $maskCoords
     */
    public function __construct(
        public readonly string $alt,
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?true $mask = null,
        public readonly ?MaskCoords $maskCoords = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->mask) $flags |= (1 << 1);
        if ($this->maskCoords !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->alt);
        $buffer .= $this->stickerset->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->maskCoords->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $mask = ($flags & (1 << 1)) ? true : null;
        $alt = Deserializer::bytes($stream);
        $stickerset = AbstractInputStickerSet::deserialize($stream);
        $maskCoords = ($flags & (1 << 0)) ? MaskCoords::deserialize($stream) : null;

        return new self(
            $alt,
            $stickerset,
            $mask,
            $maskCoords
        );
    }
}