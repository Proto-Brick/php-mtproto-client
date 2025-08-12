<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSetMultiCovered
 */
final class StickerSetMultiCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x3407e51b;
    
    public string $predicate = 'stickerSetMultiCovered';
    
    /**
     * @param StickerSet $set
     * @param list<AbstractDocument> $covers
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly array $covers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= Serializer::vectorOfObjects($this->covers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $set = StickerSet::deserialize($stream);
        $covers = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);

        return new self(
            $set,
            $covers
        );
    }
}