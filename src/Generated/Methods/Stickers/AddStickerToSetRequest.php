<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSetItem;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.addStickerToSet
 */
final class AddStickerToSetRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2253651646;
    
    public string $_ = 'stickers.addStickerToSet';
    
    public function getMethodName(): string
    {
        return 'stickers.addStickerToSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param AbstractInputStickerSetItem $sticker
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly AbstractInputStickerSetItem $sticker
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize($serializer);
        $buffer .= $this->sticker->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}