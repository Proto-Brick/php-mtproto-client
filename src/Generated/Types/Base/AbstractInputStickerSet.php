<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputStickerSet
 */
abstract class AbstractInputStickerSet extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xffb62b95 => InputStickerSetEmpty::deserialize($__payload, $__offset),
            0x9de7a269 => InputStickerSetID::deserialize($__payload, $__offset),
            0x861cc8a0 => InputStickerSetShortName::deserialize($__payload, $__offset),
            0x28703c8 => InputStickerSetAnimatedEmoji::deserialize($__payload, $__offset),
            0xe67f520e => InputStickerSetDice::deserialize($__payload, $__offset),
            0xcde3739 => InputStickerSetAnimatedEmojiAnimations::deserialize($__payload, $__offset),
            0xc88b3b02 => InputStickerSetPremiumGifts::deserialize($__payload, $__offset),
            0x4c4d4ce => InputStickerSetEmojiGenericAnimations::deserialize($__payload, $__offset),
            0x29d0f5ee => InputStickerSetEmojiDefaultStatuses::deserialize($__payload, $__offset),
            0x44c1f8e9 => InputStickerSetEmojiDefaultTopicIcons::deserialize($__payload, $__offset),
            0x49748553 => InputStickerSetEmojiChannelDefaultStatuses::deserialize($__payload, $__offset),
            0x1cf671a0 => InputStickerSetTonGifts::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputStickerSet. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}