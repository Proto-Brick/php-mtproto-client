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
    
    public string $predicate = 'channelAdminLogEventActionChangeStickerSet';
    
    /**
     * @param AbstractInputStickerSet $prevStickerset
     * @param AbstractInputStickerSet $newStickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $prevStickerset,
        public readonly AbstractInputStickerSet $newStickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevStickerset->serialize();
        $buffer .= $this->newStickerset->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevStickerset = AbstractInputStickerSet::deserialize($stream);
        $newStickerset = AbstractInputStickerSet::deserialize($stream);

        return new self(
            $prevStickerset,
            $newStickerset
        );
    }
}