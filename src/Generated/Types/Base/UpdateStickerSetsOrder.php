<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStickerSetsOrder
 */
final class UpdateStickerSetsOrder extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xbb2d201;
    
    public string $_ = 'updateStickerSetsOrder';
    
    /**
     * @param list<int> $order
     * @param bool|null $masks
     * @param bool|null $emojis
     */
    public function __construct(
        public readonly array $order,
        public readonly ?bool $masks = null,
        public readonly ?bool $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) $flags |= (1 << 0);
        if ($this->emojis) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::vectorOfLongs($this->order);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $masks = ($flags & (1 << 0)) ? true : null;
        $emojis = ($flags & (1 << 1)) ? true : null;
        $order = Deserializer::vectorOfLongs($stream);
        return new self(
            $order,
            $masks,
            $emojis
        );
    }
}