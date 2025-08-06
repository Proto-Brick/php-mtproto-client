<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeStickerSet
 */
final class ChannelAdminLogEventActionChangeStickerSet extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xb1c3caa7;
    
    public string $_ = 'channelAdminLogEventActionChangeStickerSet';
    
    /**
     * @param AbstractInputStickerSet $prevStickerset
     * @param AbstractInputStickerSet $newStickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $prevStickerset,
        public readonly AbstractInputStickerSet $newStickerset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevStickerset->serialize($serializer);
        $buffer .= $this->newStickerset->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevStickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        $newStickerset = AbstractInputStickerSet::deserialize($deserializer, $stream);
        return new self(
            $prevStickerset,
            $newStickerset
        );
    }
}