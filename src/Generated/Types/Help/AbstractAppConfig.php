<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.AppConfig
 */
abstract class AbstractAppConfig extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            AppConfigNotModified::CONSTRUCTOR_ID => AppConfigNotModified::deserialize($deserializer, $stream),
            AppConfig::CONSTRUCTOR_ID => AppConfig::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.AppConfig: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}