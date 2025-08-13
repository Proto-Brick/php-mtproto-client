<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Chat
 */
abstract class AbstractChat extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x29562865 => ChatEmpty::deserialize($stream),
            0x41cbf256 => Chat::deserialize($stream),
            0x6592a1a7 => ChatForbidden::deserialize($stream),
            0xfe685355 => Channel::deserialize($stream),
            0x17d493d5 => ChannelForbidden::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type Chat. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}