<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPageAttributeStickerSet
 */
final class WebPageAttributeStickerSet extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 1355547603;
    
    public string $_ = 'webPageAttributeStickerSet';
    
    /**
     * @param list<AbstractDocument> $stickers
     * @param bool|null $emojis
     * @param bool|null $textColor
     */
    public function __construct(
        public readonly array $stickers,
        public readonly ?bool $emojis = null,
        public readonly ?bool $textColor = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emojis) $flags |= (1 << 0);
        if ($this->textColor) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->stickers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $emojis = ($flags & (1 << 0)) ? true : null;
        $textColor = ($flags & (1 << 1)) ? true : null;
        $stickers = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
            return new self(
            $stickers,
            $emojis,
            $textColor
        );
    }
}