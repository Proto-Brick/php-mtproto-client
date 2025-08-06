<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSetCovered
 */
final class StickerSetCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x6410a5d2;
    
    public string $_ = 'stickerSetCovered';
    
    /**
     * @param StickerSet $set
     * @param AbstractDocument $cover
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly AbstractDocument $cover
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize($serializer);
        $buffer .= $this->cover->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $set = StickerSet::deserialize($deserializer, $stream);
        $cover = AbstractDocument::deserialize($deserializer, $stream);
        return new self(
            $set,
            $cover
        );
    }
}