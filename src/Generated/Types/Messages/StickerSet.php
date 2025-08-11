<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerKeyword;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerPack;
use DigitalStars\MtprotoClient\Generated\Types\Base\StickerSet as BaseStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.stickerSet
 */
final class StickerSet extends AbstractStickerSet
{
    public const CONSTRUCTOR_ID = 0x6e153f16;
    
    public string $_ = 'messages.stickerSet';
    
    /**
     * @param BaseStickerSet $set
     * @param list<StickerPack> $packs
     * @param list<StickerKeyword> $keywords
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly BaseStickerSet $set,
        public readonly array $packs,
        public readonly array $keywords,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= Serializer::vectorOfObjects($this->packs);
        $buffer .= Serializer::vectorOfObjects($this->keywords);
        $buffer .= Serializer::vectorOfObjects($this->documents);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $set = BaseStickerSet::deserialize($stream);
        $packs = Deserializer::vectorOfObjects($stream, [StickerPack::class, 'deserialize']);
        $keywords = Deserializer::vectorOfObjects($stream, [StickerKeyword::class, 'deserialize']);
        $documents = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $set,
            $packs,
            $keywords,
            $documents
        );
    }
}