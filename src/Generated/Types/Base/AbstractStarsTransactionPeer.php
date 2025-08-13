<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/StarsTransactionPeer
 */
abstract class AbstractStarsTransactionPeer extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x95f2bfe4 => StarsTransactionPeerUnsupported::deserialize($stream),
            0xb457b375 => StarsTransactionPeerAppStore::deserialize($stream),
            0x7b560a0b => StarsTransactionPeerPlayMarket::deserialize($stream),
            0x250dbaf8 => StarsTransactionPeerPremiumBot::deserialize($stream),
            0xe92fd902 => StarsTransactionPeerFragment::deserialize($stream),
            0xd80da15d => StarsTransactionPeer::deserialize($stream),
            0x60682812 => StarsTransactionPeerAds::deserialize($stream),
            0xf9677aad => StarsTransactionPeerAPI::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type StarsTransactionPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}