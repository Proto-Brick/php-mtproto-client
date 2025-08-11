<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/account.EmojiStatuses
 */
abstract class AbstractEmojiStatuses extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            EmojiStatusesNotModified::CONSTRUCTOR_ID => EmojiStatusesNotModified::deserialize($stream),
            EmojiStatuses::CONSTRUCTOR_ID => EmojiStatuses::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type account.EmojiStatuses. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}