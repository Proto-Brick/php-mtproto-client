<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stickers;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSetItem;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stickers.createStickerSet
 */
final class CreateStickerSetRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2418125671;
    
    public string $_ = 'stickers.createStickerSet';
    
    public function getMethodName(): string
    {
        return 'stickers.createStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $title
     * @param string $shortName
     * @param list<AbstractInputStickerSetItem> $stickers
     * @param bool|null $masks
     * @param bool|null $emojis
     * @param bool|null $textColor
     * @param AbstractInputDocument|null $thumb
     * @param string|null $software
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $title,
        public readonly string $shortName,
        public readonly array $stickers,
        public readonly ?bool $masks = null,
        public readonly ?bool $emojis = null,
        public readonly ?bool $textColor = null,
        public readonly ?AbstractInputDocument $thumb = null,
        public readonly ?string $software = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) $flags |= (1 << 0);
        if ($this->emojis) $flags |= (1 << 5);
        if ($this->textColor) $flags |= (1 << 6);
        if ($this->thumb !== null) $flags |= (1 << 2);
        if ($this->software !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->shortName);
        if ($flags & (1 << 2)) {
            $buffer .= $this->thumb->serialize($serializer);
        }
        $buffer .= $serializer->vectorOfObjects($this->stickers);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->software);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}