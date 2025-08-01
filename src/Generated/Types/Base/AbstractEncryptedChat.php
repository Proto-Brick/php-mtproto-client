<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EncryptedChat
 */
abstract class AbstractEncryptedChat extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            EncryptedChatEmpty::CONSTRUCTOR_ID => EncryptedChatEmpty::deserialize($deserializer, $stream),
            EncryptedChatWaiting::CONSTRUCTOR_ID => EncryptedChatWaiting::deserialize($deserializer, $stream),
            EncryptedChatRequested::CONSTRUCTOR_ID => EncryptedChatRequested::deserialize($deserializer, $stream),
            EncryptedChat::CONSTRUCTOR_ID => EncryptedChat::deserialize($deserializer, $stream),
            EncryptedChatDiscarded::CONSTRUCTOR_ID => EncryptedChatDiscarded::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type EncryptedChat: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}