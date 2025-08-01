<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputMedia
 */
abstract class AbstractInputMedia extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputMediaEmpty::CONSTRUCTOR_ID => InputMediaEmpty::deserialize($deserializer, $stream),
            InputMediaUploadedPhoto::CONSTRUCTOR_ID => InputMediaUploadedPhoto::deserialize($deserializer, $stream),
            InputMediaPhoto::CONSTRUCTOR_ID => InputMediaPhoto::deserialize($deserializer, $stream),
            InputMediaGeoPoint::CONSTRUCTOR_ID => InputMediaGeoPoint::deserialize($deserializer, $stream),
            InputMediaContact::CONSTRUCTOR_ID => InputMediaContact::deserialize($deserializer, $stream),
            InputMediaUploadedDocument::CONSTRUCTOR_ID => InputMediaUploadedDocument::deserialize($deserializer, $stream),
            InputMediaDocument::CONSTRUCTOR_ID => InputMediaDocument::deserialize($deserializer, $stream),
            InputMediaVenue::CONSTRUCTOR_ID => InputMediaVenue::deserialize($deserializer, $stream),
            InputMediaPhotoExternal::CONSTRUCTOR_ID => InputMediaPhotoExternal::deserialize($deserializer, $stream),
            InputMediaDocumentExternal::CONSTRUCTOR_ID => InputMediaDocumentExternal::deserialize($deserializer, $stream),
            InputMediaGame::CONSTRUCTOR_ID => InputMediaGame::deserialize($deserializer, $stream),
            InputMediaInvoice::CONSTRUCTOR_ID => InputMediaInvoice::deserialize($deserializer, $stream),
            InputMediaGeoLive::CONSTRUCTOR_ID => InputMediaGeoLive::deserialize($deserializer, $stream),
            InputMediaPoll::CONSTRUCTOR_ID => InputMediaPoll::deserialize($deserializer, $stream),
            InputMediaDice::CONSTRUCTOR_ID => InputMediaDice::deserialize($deserializer, $stream),
            InputMediaStory::CONSTRUCTOR_ID => InputMediaStory::deserialize($deserializer, $stream),
            InputMediaWebPage::CONSTRUCTOR_ID => InputMediaWebPage::deserialize($deserializer, $stream),
            InputMediaPaidMedia::CONSTRUCTOR_ID => InputMediaPaidMedia::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputMedia: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}