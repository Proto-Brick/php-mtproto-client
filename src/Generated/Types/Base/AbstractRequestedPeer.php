<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/RequestedPeer
 */
abstract class AbstractRequestedPeer extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xd62ff46a => RequestedPeerUser::deserialize($stream),
            0x7307544f => RequestedPeerChat::deserialize($stream),
            0x8ba403e4 => RequestedPeerChannel::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RequestedPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}