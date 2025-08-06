<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStickerSets
 */
final class UpdateStickerSets extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x31c24808;
    
    public string $_ = 'updateStickerSets';
    
    /**
     * @param bool|null $masks
     * @param bool|null $emojis
     */
    public function __construct(
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
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $masks = ($flags & (1 << 0)) ? true : null;
        $emojis = ($flags & (1 << 1)) ? true : null;
        return new self(
            $masks,
            $emojis
        );
    }
}