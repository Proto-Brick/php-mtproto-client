<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/contacts.SponsoredPeers
 */
abstract class AbstractSponsoredPeers extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xea32b4b1 => SponsoredPeersEmpty::deserialize($stream),
            0xeb032884 => SponsoredPeers::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type contacts.SponsoredPeers. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}