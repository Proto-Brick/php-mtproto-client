<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStickerSetItem
 */
final class InputStickerSetItem extends AbstractInputStickerSetItem
{
    public const CONSTRUCTOR_ID = 853188252;
    
    public string $_ = 'inputStickerSetItem';
    
    /**
     * @param AbstractInputDocument $document
     * @param string $emoji
     * @param AbstractMaskCoords|null $maskCoords
     * @param string|null $keywords
     */
    public function __construct(
        public readonly AbstractInputDocument $document,
        public readonly string $emoji,
        public readonly ?AbstractMaskCoords $maskCoords = null,
        public readonly ?string $keywords = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->maskCoords !== null) $flags |= (1 << 0);
        if ($this->keywords !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->document->serialize($serializer);
        $buffer .= $serializer->bytes($this->emoji);
        if ($flags & (1 << 0)) {
            $buffer .= $this->maskCoords->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->keywords);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $document = AbstractInputDocument::deserialize($deserializer, $stream);
        $emoji = $deserializer->bytes($stream);
        $maskCoords = ($flags & (1 << 0)) ? AbstractMaskCoords::deserialize($deserializer, $stream) : null;
        $keywords = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
            return new self(
            $document,
            $emoji,
            $maskCoords,
            $keywords
        );
    }
}