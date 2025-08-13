<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0x9664f57f => InputMediaEmpty::deserialize($stream),
            0x1e287d04 => InputMediaUploadedPhoto::deserialize($stream),
            0xb3ba0635 => InputMediaPhoto::deserialize($stream),
            0xf9c44144 => InputMediaGeoPoint::deserialize($stream),
            0xf8ab7dfb => InputMediaContact::deserialize($stream),
            0x37c9330 => InputMediaUploadedDocument::deserialize($stream),
            0xa8763ab5 => InputMediaDocument::deserialize($stream),
            0xc13d1c11 => InputMediaVenue::deserialize($stream),
            0xe5bbfe1a => InputMediaPhotoExternal::deserialize($stream),
            0x779600f9 => InputMediaDocumentExternal::deserialize($stream),
            0xd33f43f3 => InputMediaGame::deserialize($stream),
            0x405fef0d => InputMediaInvoice::deserialize($stream),
            0x971fa843 => InputMediaGeoLive::deserialize($stream),
            0xf94e5f1 => InputMediaPoll::deserialize($stream),
            0xe66fbf7b => InputMediaDice::deserialize($stream),
            0x89fdd778 => InputMediaStory::deserialize($stream),
            0xc21b8849 => InputMediaWebPage::deserialize($stream),
            0xc4103386 => InputMediaPaidMedia::deserialize($stream),
            0x9fc55fde => InputMediaTodo::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}