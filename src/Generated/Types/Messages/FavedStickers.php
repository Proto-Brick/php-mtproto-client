<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerPack;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.favedStickers
 */
final class FavedStickers extends AbstractFavedStickers
{
    public const CONSTRUCTOR_ID = 0x2cb51097;
    
    public string $_ = 'messages.favedStickers';
    
    /**
     * @param int $hash
     * @param list<StickerPack> $packs
     * @param list<AbstractDocument> $stickers
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $packs,
        public readonly array $stickers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->packs);
        $buffer .= Serializer::vectorOfObjects($this->stickers);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $hash = Deserializer::int64($stream);
        $packs = Deserializer::vectorOfObjects($stream, [StickerPack::class, 'deserialize']);
        $stickers = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $hash,
            $packs,
            $stickers
        );
    }
}