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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xffb62b95 => InputStickerSetEmpty::deserialize($stream),
            0x9de7a269 => InputStickerSetID::deserialize($stream),
            0x861cc8a0 => InputStickerSetShortName::deserialize($stream),
            0x28703c8 => InputStickerSetAnimatedEmoji::deserialize($stream),
            0xe67f520e => InputStickerSetDice::deserialize($stream),
            0xcde3739 => InputStickerSetAnimatedEmojiAnimations::deserialize($stream),
            0xc88b3b02 => InputStickerSetPremiumGifts::deserialize($stream),
            0x4c4d4ce => InputStickerSetEmojiGenericAnimations::deserialize($stream),
            0x29d0f5ee => InputStickerSetEmojiDefaultStatuses::deserialize($stream),
            0x44c1f8e9 => InputStickerSetEmojiDefaultTopicIcons::deserialize($stream),
            0x49748553 => InputStickerSetEmojiChannelDefaultStatuses::deserialize($stream),
            0x1cf671a0 => InputStickerSetTonGifts::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputStickerSet. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}