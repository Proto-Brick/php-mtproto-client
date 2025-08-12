<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputMedia
 */
abstract class AbstractInputMedia extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputMediaEmpty::CONSTRUCTOR_ID => InputMediaEmpty::deserialize($stream),
            InputMediaUploadedPhoto::CONSTRUCTOR_ID => InputMediaUploadedPhoto::deserialize($stream),
            InputMediaPhoto::CONSTRUCTOR_ID => InputMediaPhoto::deserialize($stream),
            InputMediaGeoPoint::CONSTRUCTOR_ID => InputMediaGeoPoint::deserialize($stream),
            InputMediaContact::CONSTRUCTOR_ID => InputMediaContact::deserialize($stream),
            InputMediaUploadedDocument::CONSTRUCTOR_ID => InputMediaUploadedDocument::deserialize($stream),
            InputMediaDocument::CONSTRUCTOR_ID => InputMediaDocument::deserialize($stream),
            InputMediaVenue::CONSTRUCTOR_ID => InputMediaVenue::deserialize($stream),
            InputMediaPhotoExternal::CONSTRUCTOR_ID => InputMediaPhotoExternal::deserialize($stream),
            InputMediaDocumentExternal::CONSTRUCTOR_ID => InputMediaDocumentExternal::deserialize($stream),
            InputMediaGame::CONSTRUCTOR_ID => InputMediaGame::deserialize($stream),
            InputMediaInvoice::CONSTRUCTOR_ID => InputMediaInvoice::deserialize($stream),
            InputMediaGeoLive::CONSTRUCTOR_ID => InputMediaGeoLive::deserialize($stream),
            InputMediaPoll::CONSTRUCTOR_ID => InputMediaPoll::deserialize($stream),
            InputMediaDice::CONSTRUCTOR_ID => InputMediaDice::deserialize($stream),
            InputMediaStory::CONSTRUCTOR_ID => InputMediaStory::deserialize($stream),
            InputMediaWebPage::CONSTRUCTOR_ID => InputMediaWebPage::deserialize($stream),
            InputMediaPaidMedia::CONSTRUCTOR_ID => InputMediaPaidMedia::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}