<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/peerColorCollectible
 */
final class PeerColorCollectible extends AbstractPeerColor
{
    public const CONSTRUCTOR_ID = 0xb9c0639a;
    
    public string $predicate = 'peerColorCollectible';
    
    /**
     * @param int $collectibleId
     * @param int $giftEmojiId
     * @param int $backgroundEmojiId
     * @param int $accentColor
     * @param list<int> $colors
     * @param int|null $darkAccentColor
     * @param list<int>|null $darkColors
     */
    public function __construct(
        public readonly int $collectibleId,
        public readonly int $giftEmojiId,
        public readonly int $backgroundEmojiId,
        public readonly int $accentColor,
        public readonly array $colors,
        public readonly ?int $darkAccentColor = null,
        public readonly ?array $darkColors = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->darkAccentColor !== null) {
            $flags |= (1 << 0);
        }
        if ($this->darkColors !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->collectibleId);
        $buffer .= Serializer::int64($this->giftEmojiId);
        $buffer .= Serializer::int64($this->backgroundEmojiId);
        $buffer .= Serializer::int32($this->accentColor);
        $buffer .= Serializer::vectorOfInts($this->colors);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->darkAccentColor);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfInts($this->darkColors);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $collectibleId = Deserializer::int64($__payload, $__offset);
        $giftEmojiId = Deserializer::int64($__payload, $__offset);
        $backgroundEmojiId = Deserializer::int64($__payload, $__offset);
        $accentColor = Deserializer::int32($__payload, $__offset);
        $colors = Deserializer::vectorOfInts($__payload, $__offset);
        $darkAccentColor = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $darkColors = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfInts($__payload, $__offset) : null;

        return new self(
            $collectibleId,
            $giftEmojiId,
            $backgroundEmojiId,
            $accentColor,
            $colors,
            $darkAccentColor,
            $darkColors
        );
    }
}