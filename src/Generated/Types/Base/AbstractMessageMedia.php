<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessageMedia
 */
abstract class AbstractMessageMedia extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            MessageMediaEmpty::CONSTRUCTOR_ID => MessageMediaEmpty::deserialize($deserializer, $stream),
            MessageMediaPhoto::CONSTRUCTOR_ID => MessageMediaPhoto::deserialize($deserializer, $stream),
            MessageMediaGeo::CONSTRUCTOR_ID => MessageMediaGeo::deserialize($deserializer, $stream),
            MessageMediaContact::CONSTRUCTOR_ID => MessageMediaContact::deserialize($deserializer, $stream),
            MessageMediaUnsupported::CONSTRUCTOR_ID => MessageMediaUnsupported::deserialize($deserializer, $stream),
            MessageMediaDocument::CONSTRUCTOR_ID => MessageMediaDocument::deserialize($deserializer, $stream),
            MessageMediaWebPage::CONSTRUCTOR_ID => MessageMediaWebPage::deserialize($deserializer, $stream),
            MessageMediaVenue::CONSTRUCTOR_ID => MessageMediaVenue::deserialize($deserializer, $stream),
            MessageMediaGame::CONSTRUCTOR_ID => MessageMediaGame::deserialize($deserializer, $stream),
            MessageMediaInvoice::CONSTRUCTOR_ID => MessageMediaInvoice::deserialize($deserializer, $stream),
            MessageMediaGeoLive::CONSTRUCTOR_ID => MessageMediaGeoLive::deserialize($deserializer, $stream),
            MessageMediaPoll::CONSTRUCTOR_ID => MessageMediaPoll::deserialize($deserializer, $stream),
            MessageMediaDice::CONSTRUCTOR_ID => MessageMediaDice::deserialize($deserializer, $stream),
            MessageMediaStory::CONSTRUCTOR_ID => MessageMediaStory::deserialize($deserializer, $stream),
            MessageMediaGiveaway::CONSTRUCTOR_ID => MessageMediaGiveaway::deserialize($deserializer, $stream),
            MessageMediaGiveawayResults::CONSTRUCTOR_ID => MessageMediaGiveawayResults::deserialize($deserializer, $stream),
            MessageMediaPaidMedia::CONSTRUCTOR_ID => MessageMediaPaidMedia::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type MessageMedia: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}