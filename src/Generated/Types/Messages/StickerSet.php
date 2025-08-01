<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerKeyword;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerPack;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.stickerSet
 */
final class StickerSet extends AbstractStickerSet
{
    public const CONSTRUCTOR_ID = 1846886166;
    
    public string $_ = 'messages.stickerSet';
    
    /**
     * @param AbstractStickerSet $set
     * @param list<AbstractStickerPack> $packs
     * @param list<AbstractStickerKeyword> $keywords
     * @param list<AbstractDocument> $documents
     */
    public function __construct(
        public readonly AbstractStickerSet $set,
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
        $set = AbstractStickerSet::deserialize($deserializer, $stream);
        $packs = $deserializer->vectorOfObjects($stream, [AbstractStickerPack::class, 'deserialize']);
        $keywords = $deserializer->vectorOfObjects($stream, [AbstractStickerKeyword::class, 'deserialize']);
        $documents = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
            return new self(
            $set,
            $packs,
            $keywords,
            $documents
        );
    }
}