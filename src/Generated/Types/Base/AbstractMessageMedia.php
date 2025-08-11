<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessageMedia
 */
abstract class AbstractMessageMedia extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            MessageMediaEmpty::CONSTRUCTOR_ID => MessageMediaEmpty::deserialize($stream),
            MessageMediaPhoto::CONSTRUCTOR_ID => MessageMediaPhoto::deserialize($stream),
            MessageMediaGeo::CONSTRUCTOR_ID => MessageMediaGeo::deserialize($stream),
            MessageMediaContact::CONSTRUCTOR_ID => MessageMediaContact::deserialize($stream),
            MessageMediaUnsupported::CONSTRUCTOR_ID => MessageMediaUnsupported::deserialize($stream),
            MessageMediaDocument::CONSTRUCTOR_ID => MessageMediaDocument::deserialize($stream),
            MessageMediaWebPage::CONSTRUCTOR_ID => MessageMediaWebPage::deserialize($stream),
            MessageMediaVenue::CONSTRUCTOR_ID => MessageMediaVenue::deserialize($stream),
            MessageMediaGame::CONSTRUCTOR_ID => MessageMediaGame::deserialize($stream),
            MessageMediaInvoice::CONSTRUCTOR_ID => MessageMediaInvoice::deserialize($stream),
            MessageMediaGeoLive::CONSTRUCTOR_ID => MessageMediaGeoLive::deserialize($stream),
            MessageMediaPoll::CONSTRUCTOR_ID => MessageMediaPoll::deserialize($stream),
            MessageMediaDice::CONSTRUCTOR_ID => MessageMediaDice::deserialize($stream),
            MessageMediaStory::CONSTRUCTOR_ID => MessageMediaStory::deserialize($stream),
            MessageMediaGiveaway::CONSTRUCTOR_ID => MessageMediaGiveaway::deserialize($stream),
            MessageMediaGiveawayResults::CONSTRUCTOR_ID => MessageMediaGiveawayResults::deserialize($stream),
            MessageMediaPaidMedia::CONSTRUCTOR_ID => MessageMediaPaidMedia::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}