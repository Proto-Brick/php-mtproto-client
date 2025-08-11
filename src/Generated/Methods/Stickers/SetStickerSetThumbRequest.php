<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.setStickerSetThumb
 */
final class SetStickerSetThumbRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa76a5392;
    
    public string $_ = 'stickers.setStickerSetThumb';
    
    public function getMethodName(): string
    {
        return 'stickers.setStickerSetThumb';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param AbstractInputDocument|null $thumb
     * @param int|null $thumbDocumentId
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?AbstractInputDocument $thumb = null,
        public readonly ?int $thumbDocumentId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->thumb !== null) $flags |= (1 << 0);
        if ($this->thumbDocumentId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->stickerset->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->thumb->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->thumbDocumentId);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}