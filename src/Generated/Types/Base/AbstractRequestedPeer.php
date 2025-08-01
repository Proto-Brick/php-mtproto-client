<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/RequestedPeer
 */
abstract class AbstractRequestedPeer extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            RequestedPeerUser::CONSTRUCTOR_ID => RequestedPeerUser::deserialize($deserializer, $stream),
            RequestedPeerChat::CONSTRUCTOR_ID => RequestedPeerChat::deserialize($deserializer, $stream),
            RequestedPeerChannel::CONSTRUCTOR_ID => RequestedPeerChannel::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type RequestedPeer: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}