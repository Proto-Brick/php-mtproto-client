<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.AppUpdate
 */
abstract class AbstractAppUpdate extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            AppUpdate::CONSTRUCTOR_ID => AppUpdate::deserialize($deserializer, $stream),
            NoAppUpdate::CONSTRUCTOR_ID => NoAppUpdate::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.AppUpdate: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}