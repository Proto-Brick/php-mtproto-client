<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EmojiGroup
 */
abstract class AbstractEmojiGroup extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            EmojiGroup::CONSTRUCTOR_ID => EmojiGroup::deserialize($deserializer, $stream),
            EmojiGroupGreeting::CONSTRUCTOR_ID => EmojiGroupGreeting::deserialize($deserializer, $stream),
            EmojiGroupPremium::CONSTRUCTOR_ID => EmojiGroupPremium::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type EmojiGroup: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}