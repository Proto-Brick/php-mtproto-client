<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputNotifyPeer
 */
abstract class AbstractInputNotifyPeer extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputNotifyPeer::CONSTRUCTOR_ID => InputNotifyPeer::deserialize($deserializer, $stream),
            InputNotifyUsers::CONSTRUCTOR_ID => InputNotifyUsers::deserialize($deserializer, $stream),
            InputNotifyChats::CONSTRUCTOR_ID => InputNotifyChats::deserialize($deserializer, $stream),
            InputNotifyBroadcasts::CONSTRUCTOR_ID => InputNotifyBroadcasts::deserialize($deserializer, $stream),
            InputNotifyForumTopic::CONSTRUCTOR_ID => InputNotifyForumTopic::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputNotifyPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}