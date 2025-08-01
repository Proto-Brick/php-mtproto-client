<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.BotResults
 */
abstract class AbstractBotResults extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            BotResults::CONSTRUCTOR_ID => BotResults::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.BotResults: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}