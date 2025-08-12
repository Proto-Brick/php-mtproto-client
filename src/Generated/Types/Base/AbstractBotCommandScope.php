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
            BotCommandScopeDefault::CONSTRUCTOR_ID => BotCommandScopeDefault::deserialize($stream),
            BotCommandScopeUsers::CONSTRUCTOR_ID => BotCommandScopeUsers::deserialize($stream),
            BotCommandScopeChats::CONSTRUCTOR_ID => BotCommandScopeChats::deserialize($stream),
            BotCommandScopeChatAdmins::CONSTRUCTOR_ID => BotCommandScopeChatAdmins::deserialize($stream),
            BotCommandScopePeer::CONSTRUCTOR_ID => BotCommandScopePeer::deserialize($stream),
            BotCommandScopePeerAdmins::CONSTRUCTOR_ID => BotCommandScopePeerAdmins::deserialize($stream),
            BotCommandScopePeerUser::CONSTRUCTOR_ID => BotCommandScopePeerUser::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotCommandScope. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}