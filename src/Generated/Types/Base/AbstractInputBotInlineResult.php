<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputBotInlineResult
 */
abstract class AbstractInputBotInlineResult extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputBotInlineResult::CONSTRUCTOR_ID => InputBotInlineResult::deserialize($deserializer, $stream),
            InputBotInlineResultPhoto::CONSTRUCTOR_ID => InputBotInlineResultPhoto::deserialize($deserializer, $stream),
            InputBotInlineResultDocument::CONSTRUCTOR_ID => InputBotInlineResultDocument::deserialize($deserializer, $stream),
            InputBotInlineResultGame::CONSTRUCTOR_ID => InputBotInlineResultGame::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputBotInlineResult: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}