<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputStickerSet
 */
abstract class AbstractInputStickerSet extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputStickerSetEmpty::CONSTRUCTOR_ID => InputStickerSetEmpty::deserialize($deserializer, $stream),
            InputStickerSetID::CONSTRUCTOR_ID => InputStickerSetID::deserialize($deserializer, $stream),
            InputStickerSetShortName::CONSTRUCTOR_ID => InputStickerSetShortName::deserialize($deserializer, $stream),
            InputStickerSetAnimatedEmoji::CONSTRUCTOR_ID => InputStickerSetAnimatedEmoji::deserialize($deserializer, $stream),
            InputStickerSetDice::CONSTRUCTOR_ID => InputStickerSetDice::deserialize($deserializer, $stream),
            InputStickerSetAnimatedEmojiAnimations::CONSTRUCTOR_ID => InputStickerSetAnimatedEmojiAnimations::deserialize($deserializer, $stream),
            InputStickerSetPremiumGifts::CONSTRUCTOR_ID => InputStickerSetPremiumGifts::deserialize($deserializer, $stream),
            InputStickerSetEmojiGenericAnimations::CONSTRUCTOR_ID => InputStickerSetEmojiGenericAnimations::deserialize($deserializer, $stream),
            InputStickerSetEmojiDefaultStatuses::CONSTRUCTOR_ID => InputStickerSetEmojiDefaultStatuses::deserialize($deserializer, $stream),
            InputStickerSetEmojiDefaultTopicIcons::CONSTRUCTOR_ID => InputStickerSetEmojiDefaultTopicIcons::deserialize($deserializer, $stream),
            InputStickerSetEmojiChannelDefaultStatuses::CONSTRUCTOR_ID => InputStickerSetEmojiChannelDefaultStatuses::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputStickerSet: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}