<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/NotificationSound
 */
abstract class AbstractNotificationSound extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x97e8bebe => NotificationSoundDefault::deserialize($__payload, $__offset),
            0x6f0c34df => NotificationSoundNone::deserialize($__payload, $__offset),
            0x830b9ae4 => NotificationSoundLocal::deserialize($__payload, $__offset),
            0xff6c8049 => NotificationSoundRingtone::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type NotificationSound. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}