<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/videoSizeStickerMarkup
 */
final class VideoSizeStickerMarkup extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 228623102;
    
    public string $_ = 'videoSizeStickerMarkup';
    
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param int $stickerId
     * @param list<int> $backgroundColors
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly int $stickerId,
        public readonly array $backgroundColors
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize($serializer);
        $buffer .= $serializer->int64($this->stickerId);
        $buffer .= $serializer->vectorOfInts($this->backgroundColors);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $stickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        $stickerId = $deserializer->int64($stream);
        $backgroundColors = $deserializer->vectorOfInts($stream);
            return new self(
            $stickerset,
            $stickerId,
            $backgroundColors
        );
    }
}