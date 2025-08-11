<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EncryptedChat
 */
abstract class AbstractEncryptedChat extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            EncryptedChatEmpty::CONSTRUCTOR_ID => EncryptedChatEmpty::deserialize($stream),
            EncryptedChatWaiting::CONSTRUCTOR_ID => EncryptedChatWaiting::deserialize($stream),
            EncryptedChatRequested::CONSTRUCTOR_ID => EncryptedChatRequested::deserialize($stream),
            EncryptedChat::CONSTRUCTOR_ID => EncryptedChat::deserialize($stream),
            EncryptedChatDiscarded::CONSTRUCTOR_ID => EncryptedChatDiscarded::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type EncryptedChat. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}