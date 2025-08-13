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
            0x3ded6320 => MessageMediaEmpty::deserialize($stream),
            0x695150d7 => MessageMediaPhoto::deserialize($stream),
            0x56e0d474 => MessageMediaGeo::deserialize($stream),
            0x70322949 => MessageMediaContact::deserialize($stream),
            0x9f84f49e => MessageMediaUnsupported::deserialize($stream),
            0x52d8ccd9 => MessageMediaDocument::deserialize($stream),
            0xddf10c3b => MessageMediaWebPage::deserialize($stream),
            0x2ec0533f => MessageMediaVenue::deserialize($stream),
            0xfdb19008 => MessageMediaGame::deserialize($stream),
            0xf6a548d3 => MessageMediaInvoice::deserialize($stream),
            0xb940c666 => MessageMediaGeoLive::deserialize($stream),
            0x4bd6e798 => MessageMediaPoll::deserialize($stream),
            0x3f7ee58b => MessageMediaDice::deserialize($stream),
            0x68cb6283 => MessageMediaStory::deserialize($stream),
            0xaa073beb => MessageMediaGiveaway::deserialize($stream),
            0xceaa3ea1 => MessageMediaGiveawayResults::deserialize($stream),
            0xa8852491 => MessageMediaPaidMedia::deserialize($stream),
            0x8a53b014 => MessageMediaToDo::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageMedia. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}