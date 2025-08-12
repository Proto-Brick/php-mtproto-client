<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            RequestPeerTypeUser::CONSTRUCTOR_ID => RequestPeerTypeUser::deserialize($stream),
            RequestPeerTypeChat::CONSTRUCTOR_ID => RequestPeerTypeChat::deserialize($stream),
            RequestPeerTypeBroadcast::CONSTRUCTOR_ID => RequestPeerTypeBroadcast::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RequestPeerType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}