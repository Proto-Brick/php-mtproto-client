<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.CodeType
 */
abstract class AbstractCodeType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            CodeTypeSms::CONSTRUCTOR_ID => CodeTypeSms::deserialize($stream),
            CodeTypeCall::CONSTRUCTOR_ID => CodeTypeCall::deserialize($stream),
            CodeTypeFlashCall::CONSTRUCTOR_ID => CodeTypeFlashCall::deserialize($stream),
            CodeTypeMissedCall::CONSTRUCTOR_ID => CodeTypeMissedCall::deserialize($stream),
            CodeTypeFragmentSms::CONSTRUCTOR_ID => CodeTypeFragmentSms::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type auth.CodeType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}