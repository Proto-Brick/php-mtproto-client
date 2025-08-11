<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BotMenuButton
 */
abstract class AbstractBotMenuButton extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            BotMenuButtonDefault::CONSTRUCTOR_ID => BotMenuButtonDefault::deserialize($stream),
            BotMenuButtonCommands::CONSTRUCTOR_ID => BotMenuButtonCommands::deserialize($stream),
            BotMenuButton::CONSTRUCTOR_ID => BotMenuButton::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotMenuButton. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}