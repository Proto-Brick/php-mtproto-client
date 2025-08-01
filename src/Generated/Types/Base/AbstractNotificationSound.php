<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/NotificationSound
 */
abstract class AbstractNotificationSound extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            NotificationSoundDefault::CONSTRUCTOR_ID => NotificationSoundDefault::deserialize($deserializer, $stream),
            NotificationSoundNone::CONSTRUCTOR_ID => NotificationSoundNone::deserialize($deserializer, $stream),
            NotificationSoundLocal::CONSTRUCTOR_ID => NotificationSoundLocal::deserialize($deserializer, $stream),
            NotificationSoundRingtone::CONSTRUCTOR_ID => NotificationSoundRingtone::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type NotificationSound: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}