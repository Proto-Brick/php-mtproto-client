<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/NotifyPeer
 */
abstract class AbstractNotifyPeer extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            NotifyPeer::CONSTRUCTOR_ID => NotifyPeer::deserialize($stream),
            NotifyUsers::CONSTRUCTOR_ID => NotifyUsers::deserialize($stream),
            NotifyChats::CONSTRUCTOR_ID => NotifyChats::deserialize($stream),
            NotifyBroadcasts::CONSTRUCTOR_ID => NotifyBroadcasts::deserialize($stream),
            NotifyForumTopic::CONSTRUCTOR_ID => NotifyForumTopic::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type NotifyPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}