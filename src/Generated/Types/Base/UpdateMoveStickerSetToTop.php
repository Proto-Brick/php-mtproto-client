<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMoveStickerSetToTop
 */
final class UpdateMoveStickerSetToTop extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x86fccf85;
    
    public string $_ = 'updateMoveStickerSetToTop';
    
    /**
     * @param int $stickerset
     * @param bool|null $masks
     * @param bool|null $emojis
     */
    public function __construct(
        public readonly int $stickerset,
        public readonly ?bool $masks = null,
        public readonly ?bool $emojis = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) $flags |= (1 << 0);
        if ($this->emojis) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->stickerset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $masks = ($flags & (1 << 0)) ? true : null;
        $emojis = ($flags & (1 << 1)) ? true : null;
        $stickerset = $deserializer->int64($stream);
        return new self(
            $stickerset,
            $masks,
            $emojis
        );
    }
}