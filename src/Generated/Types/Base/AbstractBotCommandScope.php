<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BotCommandScope
 */
abstract class AbstractBotCommandScope extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x2f6cb2ab => BotCommandScopeDefault::deserialize($stream),
            0x3c4f04d8 => BotCommandScopeUsers::deserialize($stream),
            0x6fe1a881 => BotCommandScopeChats::deserialize($stream),
            0xb9aa606a => BotCommandScopeChatAdmins::deserialize($stream),
            0xdb9d897d => BotCommandScopePeer::deserialize($stream),
            0x3fd863d1 => BotCommandScopePeerAdmins::deserialize($stream),
            0xa1321f3 => BotCommandScopePeerUser::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotCommandScope. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}