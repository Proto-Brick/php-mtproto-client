<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EmojiStatus
 */
abstract class AbstractEmojiStatus extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            EmojiStatusEmpty::CONSTRUCTOR_ID => EmojiStatusEmpty::deserialize($stream),
            EmojiStatus::CONSTRUCTOR_ID => EmojiStatus::deserialize($stream),
            EmojiStatusCollectible::CONSTRUCTOR_ID => EmojiStatusCollectible::deserialize($stream),
            InputEmojiStatusCollectible::CONSTRUCTOR_ID => InputEmojiStatusCollectible::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type EmojiStatus. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}