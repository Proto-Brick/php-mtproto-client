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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x97e8bebe => NotificationSoundDefault::deserialize($stream),
            0x6f0c34df => NotificationSoundNone::deserialize($stream),
            0x830b9ae4 => NotificationSoundLocal::deserialize($stream),
            0xff6c8049 => NotificationSoundRingtone::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type NotificationSound. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}