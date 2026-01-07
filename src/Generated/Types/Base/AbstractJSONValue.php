<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/JSONValue
 */
abstract class AbstractJSONValue extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x3f6d7b68 => JsonNull::deserialize($__payload, $__offset),
            0xc7345e6a => JsonBool::deserialize($__payload, $__offset),
            0x2be0dfa4 => JsonNumber::deserialize($__payload, $__offset),
            0xb71e767a => JsonString::deserialize($__payload, $__offset),
            0xf7444763 => JsonArray::deserialize($__payload, $__offset),
            0x99c1d49d => JsonObject::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type JSONValue. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}