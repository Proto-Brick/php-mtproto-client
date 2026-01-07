<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/NotifyPeer
 */
abstract class AbstractNotifyPeer extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x9fd40bd8 => NotifyPeer::deserialize($__payload, $__offset),
            0xb4c83b4c => NotifyUsers::deserialize($__payload, $__offset),
            0xc007cec3 => NotifyChats::deserialize($__payload, $__offset),
            0xd612e8ef => NotifyBroadcasts::deserialize($__payload, $__offset),
            0x226e6308 => NotifyForumTopic::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type NotifyPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}