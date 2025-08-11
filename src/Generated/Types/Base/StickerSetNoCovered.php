<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSetNoCovered
 */
final class StickerSetNoCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x77b15d1c;
    
    public string $_ = 'stickerSetNoCovered';
    
    /**
     * @param StickerSet $set
     */
    public function __construct(
        public readonly StickerSet $set
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $set = StickerSet::deserialize($stream);
        return new self(
            $set
        );
    }
}