<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.SupportName
 */
abstract class AbstractSupportName extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SupportName::CONSTRUCTOR_ID => SupportName::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.SupportName: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}