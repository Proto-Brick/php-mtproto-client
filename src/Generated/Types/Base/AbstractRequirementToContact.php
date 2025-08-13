<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/RequirementToContact
 */
abstract class AbstractRequirementToContact extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x50a9839 => RequirementToContactEmpty::deserialize($stream),
            0xe581e4e9 => RequirementToContactPremium::deserialize($stream),
            0xb4f67e93 => RequirementToContactPaidMessages::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type RequirementToContact. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}