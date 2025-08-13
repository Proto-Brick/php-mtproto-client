<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChatInvite
 */
abstract class AbstractChatInvite extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x5a686d7c => ChatInviteAlready::deserialize($stream),
            0x5c9d3702 => ChatInvite::deserialize($stream),
            0x61695cb0 => ChatInvitePeek::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChatInvite. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}