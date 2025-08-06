<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/contacts.TopPeers
 */
abstract class AbstractTopPeers extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            TopPeersNotModified::CONSTRUCTOR_ID => TopPeersNotModified::deserialize($deserializer, $stream),
            TopPeers::CONSTRUCTOR_ID => TopPeers::deserialize($deserializer, $stream),
            TopPeersDisabled::CONSTRUCTOR_ID => TopPeersDisabled::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type contacts.TopPeers. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}