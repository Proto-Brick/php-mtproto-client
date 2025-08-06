<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStickerSetThumb
 */
final class InputStickerSetThumb extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x9d84f3db;
    
    public string $_ = 'inputStickerSetThumb';
    
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param int $thumbVersion
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly int $thumbVersion
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize($serializer);
        $buffer .= $serializer->int32($this->thumbVersion);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $stickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        $thumbVersion = $deserializer->int32($stream);
        return new self(
            $stickerset,
            $thumbVersion
        );
    }
}