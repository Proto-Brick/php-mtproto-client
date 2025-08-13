<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/chatlists.ChatlistInvite
 */
abstract class AbstractChatlistInvite extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xfa87f659 => ChatlistInviteAlready::deserialize($stream),
            0xf10ece2f => ChatlistInvite::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type chatlists.ChatlistInvite. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}