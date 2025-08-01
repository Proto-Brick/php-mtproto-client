<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.SentCode
 */
abstract class AbstractSentCode extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SentCode::CONSTRUCTOR_ID => SentCode::deserialize($deserializer, $stream),
            SentCodeSuccess::CONSTRUCTOR_ID => SentCodeSuccess::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type auth.SentCode: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}