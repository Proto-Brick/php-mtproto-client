<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/MessageMedia
 */
abstract class AbstractMessageMedia extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x3ded6320 => MessageMediaEmpty::deserialize($__payload, $__offset),
            0x695150d7 => MessageMediaPhoto::deserialize($__payload, $__offset),
            0x56e0d474 => MessageMediaGeo::deserialize($__payload, $__offset),
            0x70322949 => MessageMediaContact::deserialize($__payload, $__offset),
            0x9f84f49e => MessageMediaUnsupported::deserialize($__payload, $__offset),
            0x52d8ccd9 => MessageMediaDocument::deserialize($__payload, $__offset),
            0xddf10c3b => MessageMediaWebPage::deserialize($__payload, $__offset),
            0x2ec0533f => MessageMediaVenue::deserialize($__payload, $__offset),
            0xfdb19008 => MessageMediaGame::deserialize($__payload, $__offset),
            0xf6a548d3 => MessageMediaInvoice::deserialize($__payload, $__offset),
            0xb940c666 => MessageMediaGeoLive::deserialize($__payload, $__offset),
            0x4bd6e798 => MessageMediaPoll::deserialize($__payload, $__offset),
            0x3f7ee58b => MessageMediaDice::deserialize($__payload, $__offset),
            0x68cb6283 => MessageMediaStory::deserialize($__payload, $__offset),
            0xaa073beb => MessageMediaGiveaway::deserialize($__payload, $__offset),
            0xceaa3ea1 => MessageMediaGiveawayResults::deserialize($__payload, $__offset),
            0xa8852491 => MessageMediaPaidMedia::deserialize($__payload, $__offset),
            0x8a53b014 => MessageMediaToDo::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessageMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}