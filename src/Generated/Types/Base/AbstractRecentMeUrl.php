<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/RecentMeUrl
 */
abstract class AbstractRecentMeUrl extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x46e1d13d => RecentMeUrlUnknown::deserialize($stream),
            0xb92c09e2 => RecentMeUrlUser::deserialize($stream),
            0xb2da71d2 => RecentMeUrlChat::deserialize($stream),
            0xeb49081d => RecentMeUrlChatInvite::deserialize($stream),
            0xbc0a57dc => RecentMeUrlStickerSet::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RecentMeUrl. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}