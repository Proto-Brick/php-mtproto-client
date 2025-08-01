<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/channels.AdminLogResults
 */
abstract class AbstractAdminLogResults extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            AdminLogResults::CONSTRUCTOR_ID => AdminLogResults::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type channels.AdminLogResults: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}