<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Chatlists;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/chatlists.ChatlistInvite
 */
abstract class AbstractChatlistInvite extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xfa87f659 => ChatlistInviteAlready::deserialize($__payload, $__offset),
            0xf10ece2f => ChatlistInvite::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type chatlists.ChatlistInvite. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}