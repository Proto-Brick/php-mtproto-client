<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/NotifyPeer
 */
abstract class AbstractNotifyPeer extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            NotifyPeer::CONSTRUCTOR_ID => NotifyPeer::deserialize($deserializer, $stream),
            NotifyUsers::CONSTRUCTOR_ID => NotifyUsers::deserialize($deserializer, $stream),
            NotifyChats::CONSTRUCTOR_ID => NotifyChats::deserialize($deserializer, $stream),
            NotifyBroadcasts::CONSTRUCTOR_ID => NotifyBroadcasts::deserialize($deserializer, $stream),
            NotifyForumTopic::CONSTRUCTOR_ID => NotifyForumTopic::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type NotifyPeer: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}