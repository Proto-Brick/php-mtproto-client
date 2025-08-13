<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputNotifyPeer
 */
abstract class AbstractInputNotifyPeer extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xb8bc5b0c => InputNotifyPeer::deserialize($stream),
            0x193b4417 => InputNotifyUsers::deserialize($stream),
            0x4a95e84e => InputNotifyChats::deserialize($stream),
            0xb1db7c7e => InputNotifyBroadcasts::deserialize($stream),
            0x5c467992 => InputNotifyForumTopic::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputNotifyPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}