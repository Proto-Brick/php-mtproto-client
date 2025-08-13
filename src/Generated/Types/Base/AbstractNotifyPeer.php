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
            0x9fd40bd8 => NotifyPeer::deserialize($stream),
            0xb4c83b4c => NotifyUsers::deserialize($stream),
            0xc007cec3 => NotifyChats::deserialize($stream),
            0xd612e8ef => NotifyBroadcasts::deserialize($stream),
            0x226e6308 => NotifyForumTopic::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type NotifyPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}