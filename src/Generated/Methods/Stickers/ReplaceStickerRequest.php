<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetItem;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.replaceSticker
 */
final class ReplaceStickerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4696459a;
    
    public string $predicate = 'stickers.replaceSticker';
    
    public function getMethodName(): string
    {
        return 'stickers.replaceSticker';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     * @param InputStickerSetItem $newSticker
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker,
        public readonly InputStickerSetItem $newSticker
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sticker->serialize();
        $buffer .= $this->newSticker->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}