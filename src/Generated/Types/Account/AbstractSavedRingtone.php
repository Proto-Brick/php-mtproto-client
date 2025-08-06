<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/account.SavedRingtone
 */
abstract class AbstractSavedRingtone extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            SavedRingtone::CONSTRUCTOR_ID => SavedRingtone::deserialize($deserializer, $stream),
            SavedRingtoneConverted::CONSTRUCTOR_ID => SavedRingtoneConverted::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type account.SavedRingtone. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}