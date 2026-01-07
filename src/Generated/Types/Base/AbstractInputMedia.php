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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x9664f57f => InputMediaEmpty::deserialize($__payload, $__offset),
            0x1e287d04 => InputMediaUploadedPhoto::deserialize($__payload, $__offset),
            0xb3ba0635 => InputMediaPhoto::deserialize($__payload, $__offset),
            0xf9c44144 => InputMediaGeoPoint::deserialize($__payload, $__offset),
            0xf8ab7dfb => InputMediaContact::deserialize($__payload, $__offset),
            0x37c9330 => InputMediaUploadedDocument::deserialize($__payload, $__offset),
            0xa8763ab5 => InputMediaDocument::deserialize($__payload, $__offset),
            0xc13d1c11 => InputMediaVenue::deserialize($__payload, $__offset),
            0xe5bbfe1a => InputMediaPhotoExternal::deserialize($__payload, $__offset),
            0x779600f9 => InputMediaDocumentExternal::deserialize($__payload, $__offset),
            0xd33f43f3 => InputMediaGame::deserialize($__payload, $__offset),
            0x405fef0d => InputMediaInvoice::deserialize($__payload, $__offset),
            0x971fa843 => InputMediaGeoLive::deserialize($__payload, $__offset),
            0xf94e5f1 => InputMediaPoll::deserialize($__payload, $__offset),
            0xe66fbf7b => InputMediaDice::deserialize($__payload, $__offset),
            0x89fdd778 => InputMediaStory::deserialize($__payload, $__offset),
            0xc21b8849 => InputMediaWebPage::deserialize($__payload, $__offset),
            0xc4103386 => InputMediaPaidMedia::deserialize($__payload, $__offset),
            0x9fc55fde => InputMediaTodo::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}