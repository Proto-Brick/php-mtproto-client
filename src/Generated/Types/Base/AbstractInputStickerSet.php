<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            InputStickerSetEmpty::CONSTRUCTOR_ID => InputStickerSetEmpty::deserialize($stream),
            InputStickerSetID::CONSTRUCTOR_ID => InputStickerSetID::deserialize($stream),
            InputStickerSetShortName::CONSTRUCTOR_ID => InputStickerSetShortName::deserialize($stream),
            InputStickerSetAnimatedEmoji::CONSTRUCTOR_ID => InputStickerSetAnimatedEmoji::deserialize($stream),
            InputStickerSetDice::CONSTRUCTOR_ID => InputStickerSetDice::deserialize($stream),
            InputStickerSetAnimatedEmojiAnimations::CONSTRUCTOR_ID => InputStickerSetAnimatedEmojiAnimations::deserialize($stream),
            InputStickerSetPremiumGifts::CONSTRUCTOR_ID => InputStickerSetPremiumGifts::deserialize($stream),
            InputStickerSetEmojiGenericAnimations::CONSTRUCTOR_ID => InputStickerSetEmojiGenericAnimations::deserialize($stream),
            InputStickerSetEmojiDefaultStatuses::CONSTRUCTOR_ID => InputStickerSetEmojiDefaultStatuses::deserialize($stream),
            InputStickerSetEmojiDefaultTopicIcons::CONSTRUCTOR_ID => InputStickerSetEmojiDefaultTopicIcons::deserialize($stream),
            InputStickerSetEmojiChannelDefaultStatuses::CONSTRUCTOR_ID => InputStickerSetEmojiChannelDefaultStatuses::deserialize($stream),
            InputStickerSetTonGifts::CONSTRUCTOR_ID => InputStickerSetTonGifts::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputStickerSet. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}