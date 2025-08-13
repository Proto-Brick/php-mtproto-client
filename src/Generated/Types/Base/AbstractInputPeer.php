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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x7f3b18ea => InputPeerEmpty::deserialize($stream),
            0x7da07ec9 => InputPeerSelf::deserialize($stream),
            0x35a95cb9 => InputPeerChat::deserialize($stream),
            0xdde8a54c => InputPeerUser::deserialize($stream),
            0x27bcbbfc => InputPeerChannel::deserialize($stream),
            0xa87b0a1c => InputPeerUserFromMessage::deserialize($stream),
            0xbd2a0840 => InputPeerChannelFromMessage::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}