<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/JSONValue
 */
abstract class AbstractJSONValue extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            JsonNull::CONSTRUCTOR_ID => JsonNull::deserialize($deserializer, $stream),
            JsonBool::CONSTRUCTOR_ID => JsonBool::deserialize($deserializer, $stream),
            JsonNumber::CONSTRUCTOR_ID => JsonNumber::deserialize($deserializer, $stream),
            JsonString::CONSTRUCTOR_ID => JsonString::deserialize($deserializer, $stream),
            JsonArray::CONSTRUCTOR_ID => JsonArray::deserialize($deserializer, $stream),
            JsonObject::CONSTRUCTOR_ID => JsonObject::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type JSONValue: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}