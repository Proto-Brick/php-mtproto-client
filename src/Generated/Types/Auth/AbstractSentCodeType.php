<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/auth.SentCodeType
 */
abstract class AbstractSentCodeType extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x3dbb5986 => SentCodeTypeApp::deserialize($__payload, $__offset),
            0xc000bba2 => SentCodeTypeSms::deserialize($__payload, $__offset),
            0x5353e5a7 => SentCodeTypeCall::deserialize($__payload, $__offset),
            0xab03c6d9 => SentCodeTypeFlashCall::deserialize($__payload, $__offset),
            0x82006484 => SentCodeTypeMissedCall::deserialize($__payload, $__offset),
            0xf450f59b => SentCodeTypeEmailCode::deserialize($__payload, $__offset),
            0xa5491dea => SentCodeTypeSetUpEmailRequired::deserialize($__payload, $__offset),
            0xd9565c39 => SentCodeTypeFragmentSms::deserialize($__payload, $__offset),
            0x9fd736 => SentCodeTypeFirebaseSms::deserialize($__payload, $__offset),
            0xa416ac81 => SentCodeTypeSmsWord::deserialize($__payload, $__offset),
            0xb37794af => SentCodeTypeSmsPhrase::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type auth.SentCodeType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}