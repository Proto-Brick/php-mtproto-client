<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MediaArea
 */
abstract class AbstractMediaArea extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            MediaAreaVenue::CONSTRUCTOR_ID => MediaAreaVenue::deserialize($deserializer, $stream),
            InputMediaAreaVenue::CONSTRUCTOR_ID => InputMediaAreaVenue::deserialize($deserializer, $stream),
            MediaAreaGeoPoint::CONSTRUCTOR_ID => MediaAreaGeoPoint::deserialize($deserializer, $stream),
            MediaAreaSuggestedReaction::CONSTRUCTOR_ID => MediaAreaSuggestedReaction::deserialize($deserializer, $stream),
            MediaAreaChannelPost::CONSTRUCTOR_ID => MediaAreaChannelPost::deserialize($deserializer, $stream),
            InputMediaAreaChannelPost::CONSTRUCTOR_ID => InputMediaAreaChannelPost::deserialize($deserializer, $stream),
            MediaAreaUrl::CONSTRUCTOR_ID => MediaAreaUrl::deserialize($deserializer, $stream),
            MediaAreaWeather::CONSTRUCTOR_ID => MediaAreaWeather::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type MediaArea: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}