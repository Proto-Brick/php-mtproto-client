<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ExportedChatInvite
 */
abstract class AbstractExportedChatInvite extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            ChatInviteExported::CONSTRUCTOR_ID => ChatInviteExported::deserialize($stream),
            ChatInvitePublicJoinRequests::CONSTRUCTOR_ID => ChatInvitePublicJoinRequests::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ExportedChatInvite. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}