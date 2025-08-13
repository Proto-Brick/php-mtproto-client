<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/LangPackString
 */
abstract class AbstractLangPackString extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xcad181f6 => LangPackString::deserialize($stream),
            0x6c47ac9f => LangPackStringPluralized::deserialize($stream),
            0x2979eeb2 => LangPackStringDeleted::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type LangPackString. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}