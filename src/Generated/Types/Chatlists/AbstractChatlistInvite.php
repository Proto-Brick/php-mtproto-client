<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/chatlists.ChatlistInvite
 */
abstract class AbstractChatlistInvite extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ChatlistInviteAlready::CONSTRUCTOR_ID => ChatlistInviteAlready::deserialize($deserializer, $stream),
            ChatlistInvite::CONSTRUCTOR_ID => ChatlistInvite::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type chatlists.ChatlistInvite: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}