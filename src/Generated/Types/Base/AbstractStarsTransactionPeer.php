<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StarsTransactionPeer
 */
abstract class AbstractStarsTransactionPeer extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            StarsTransactionPeerUnsupported::CONSTRUCTOR_ID => StarsTransactionPeerUnsupported::deserialize($deserializer, $stream),
            StarsTransactionPeerAppStore::CONSTRUCTOR_ID => StarsTransactionPeerAppStore::deserialize($deserializer, $stream),
            StarsTransactionPeerPlayMarket::CONSTRUCTOR_ID => StarsTransactionPeerPlayMarket::deserialize($deserializer, $stream),
            StarsTransactionPeerPremiumBot::CONSTRUCTOR_ID => StarsTransactionPeerPremiumBot::deserialize($deserializer, $stream),
            StarsTransactionPeerFragment::CONSTRUCTOR_ID => StarsTransactionPeerFragment::deserialize($deserializer, $stream),
            StarsTransactionPeer::CONSTRUCTOR_ID => StarsTransactionPeer::deserialize($deserializer, $stream),
            StarsTransactionPeerAds::CONSTRUCTOR_ID => StarsTransactionPeerAds::deserialize($deserializer, $stream),
            StarsTransactionPeerAPI::CONSTRUCTOR_ID => StarsTransactionPeerAPI::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type StarsTransactionPeer: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}