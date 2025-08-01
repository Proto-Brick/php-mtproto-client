<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Contacts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/contacts.Blocked
 */
abstract class AbstractBlocked extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            Blocked::CONSTRUCTOR_ID => Blocked::deserialize($deserializer, $stream),
            BlockedSlice::CONSTRUCTOR_ID => BlockedSlice::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type contacts.Blocked: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}