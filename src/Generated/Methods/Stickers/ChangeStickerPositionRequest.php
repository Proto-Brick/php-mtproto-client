<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.changeStickerPosition
 */
final class ChangeStickerPositionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xffb6d4ca;
    
    public string $predicate = 'stickers.changeStickerPosition';
    
    public function getMethodName(): string
    {
        return 'stickers.changeStickerPosition';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     * @param int $position
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker,
        public readonly int $position
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sticker->serialize();
        $buffer .= Serializer::int32($this->position);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}