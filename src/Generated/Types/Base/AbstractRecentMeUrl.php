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
            RecentMeUrlUnknown::CONSTRUCTOR_ID => RecentMeUrlUnknown::deserialize($stream),
            RecentMeUrlUser::CONSTRUCTOR_ID => RecentMeUrlUser::deserialize($stream),
            RecentMeUrlChat::CONSTRUCTOR_ID => RecentMeUrlChat::deserialize($stream),
            RecentMeUrlChatInvite::CONSTRUCTOR_ID => RecentMeUrlChatInvite::deserialize($stream),
            RecentMeUrlStickerSet::CONSTRUCTOR_ID => RecentMeUrlStickerSet::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RecentMeUrl. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}