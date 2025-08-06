<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerPack;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.recentStickers
 */
final class RecentStickers extends AbstractRecentStickers
{
    public const CONSTRUCTOR_ID = 0x88d37c56;
    
    public string $_ = 'messages.recentStickers';
    
    /**
     * @param int $hash
     * @param list<StickerPack> $packs
     * @param list<AbstractDocument> $stickers
     * @param list<int> $dates
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $packs,
        public readonly array $stickers,
        public readonly array $dates
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->packs);
        $buffer .= $serializer->vectorOfObjects($this->stickers);
        $buffer .= $serializer->vectorOfInts($this->dates);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $packs = $deserializer->vectorOfObjects($stream, [StickerPack::class, 'deserialize']);
        $stickers = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $dates = $deserializer->vectorOfInts($stream);
        return new self(
            $hash,
            $packs,
            $stickers,
            $dates
        );
    }
}