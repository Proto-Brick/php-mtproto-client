<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/phone.GroupCallStreamChannels
 */
abstract class AbstractGroupCallStreamChannels extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            GroupCallStreamChannels::CONSTRUCTOR_ID => GroupCallStreamChannels::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type phone.GroupCallStreamChannels: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}