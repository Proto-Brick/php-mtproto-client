<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MediaArea
 */
abstract class AbstractMediaArea extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            MediaAreaVenue::CONSTRUCTOR_ID => MediaAreaVenue::deserialize($stream),
            InputMediaAreaVenue::CONSTRUCTOR_ID => InputMediaAreaVenue::deserialize($stream),
            MediaAreaGeoPoint::CONSTRUCTOR_ID => MediaAreaGeoPoint::deserialize($stream),
            MediaAreaSuggestedReaction::CONSTRUCTOR_ID => MediaAreaSuggestedReaction::deserialize($stream),
            MediaAreaChannelPost::CONSTRUCTOR_ID => MediaAreaChannelPost::deserialize($stream),
            InputMediaAreaChannelPost::CONSTRUCTOR_ID => InputMediaAreaChannelPost::deserialize($stream),
            MediaAreaUrl::CONSTRUCTOR_ID => MediaAreaUrl::deserialize($stream),
            MediaAreaWeather::CONSTRUCTOR_ID => MediaAreaWeather::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MediaArea. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}