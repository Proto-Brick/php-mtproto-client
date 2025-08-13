<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/RequestPeerType
 */
abstract class AbstractRequestPeerType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x5f3b8a00 => RequestPeerTypeUser::deserialize($stream),
            0xc9f06e1b => RequestPeerTypeChat::deserialize($stream),
            0x339bef6c => RequestPeerTypeBroadcast::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type RequestPeerType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}