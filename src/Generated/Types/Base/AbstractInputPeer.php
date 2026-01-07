<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputPeer
 */
abstract class AbstractInputPeer extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x7f3b18ea => InputPeerEmpty::deserialize($__payload, $__offset),
            0x7da07ec9 => InputPeerSelf::deserialize($__payload, $__offset),
            0x35a95cb9 => InputPeerChat::deserialize($__payload, $__offset),
            0xdde8a54c => InputPeerUser::deserialize($__payload, $__offset),
            0x27bcbbfc => InputPeerChannel::deserialize($__payload, $__offset),
            0xa87b0a1c => InputPeerUserFromMessage::deserialize($__payload, $__offset),
            0xbd2a0840 => InputPeerChannelFromMessage::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}