<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSetFullCovered
 */
final class StickerSetFullCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x40d13c0e;
    
    public string $_ = 'stickerSetFullCovered';
    
    /**
     * @param StickerSet $set
     * @param list<StickerPack> $packs
     * @param list<StickerKeyword> $keywords
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly array $packs,
        public readonly array $keywords,
        public readonly array $documents
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->packs);
        $buffer .= $serializer->vectorOfObjects($this->keywords);
        $buffer .= $serializer->vectorOfObjects($this->documents);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $set = StickerSet::deserialize($deserializer, $stream);
        $packs = $deserializer->vectorOfObjects($stream, [StickerPack::class, 'deserialize']);
        $keywords = $deserializer->vectorOfObjects($stream, [StickerKeyword::class, 'deserialize']);
        $documents = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $set,
            $packs,
            $keywords,
            $documents
        );
    }
}