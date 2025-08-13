<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/contacts.TopPeers
 */
abstract class AbstractTopPeers extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xde266ef5 => TopPeersNotModified::deserialize($stream),
            0x70b772a8 => TopPeers::deserialize($stream),
            0xb52c939d => TopPeersDisabled::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type contacts.TopPeers. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}