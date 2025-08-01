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
    public const CONSTRUCTOR_ID = 872932635;
    
    public string $_ = 'stickerSetMultiCovered';
    
    /**
     * @param AbstractStickerSet $set
     * @param list<AbstractDocument> $covers
     */
    public function __construct(
        public readonly AbstractStickerSet $set,
        public readonly array $covers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->covers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $set = AbstractStickerSet::deserialize($deserializer, $stream);
        $covers = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
            return new self(
            $set,
            $covers
        );
    }
}