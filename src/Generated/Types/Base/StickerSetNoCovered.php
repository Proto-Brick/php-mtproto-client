<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSetNoCovered
 */
final class StickerSetNoCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 2008112412;
    
    public string $_ = 'stickerSetNoCovered';
    
    /**
     * @param AbstractStickerSet $set
     */
    public function __construct(
        public readonly AbstractStickerSet $set
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $set = AbstractStickerSet::deserialize($deserializer, $stream);
            return new self(
            $set
        );
    }
}