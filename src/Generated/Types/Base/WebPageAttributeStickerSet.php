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
    public const CONSTRUCTOR_ID = 0x50cc03d3;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emojis) $flags |= (1 << 0);
        if ($this->textColor) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::vectorOfObjects($this->stickers);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $emojis = ($flags & (1 << 0)) ? true : null;
        $textColor = ($flags & (1 << 1)) ? true : null;
        $stickers = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $stickers,
            $emojis,
            $textColor
        );
    }
}