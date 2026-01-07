<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/MediaArea
 */
abstract class AbstractMediaArea extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xbe82db9c => MediaAreaVenue::deserialize($__payload, $__offset),
            0xb282217f => InputMediaAreaVenue::deserialize($__payload, $__offset),
            0xcad5452d => MediaAreaGeoPoint::deserialize($__payload, $__offset),
            0x14455871 => MediaAreaSuggestedReaction::deserialize($__payload, $__offset),
            0x770416af => MediaAreaChannelPost::deserialize($__payload, $__offset),
            0x2271f2bf => InputMediaAreaChannelPost::deserialize($__payload, $__offset),
            0x37381085 => MediaAreaUrl::deserialize($__payload, $__offset),
            0x49a6549c => MediaAreaWeather::deserialize($__payload, $__offset),
            0x5787686d => MediaAreaStarGift::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MediaArea. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}