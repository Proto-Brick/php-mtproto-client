<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.CodeType
 */
abstract class AbstractCodeType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            CodeTypeSms::CONSTRUCTOR_ID => CodeTypeSms::deserialize($deserializer, $stream),
            CodeTypeCall::CONSTRUCTOR_ID => CodeTypeCall::deserialize($deserializer, $stream),
            CodeTypeFlashCall::CONSTRUCTOR_ID => CodeTypeFlashCall::deserialize($deserializer, $stream),
            CodeTypeMissedCall::CONSTRUCTOR_ID => CodeTypeMissedCall::deserialize($deserializer, $stream),
            CodeTypeFragmentSms::CONSTRUCTOR_ID => CodeTypeFragmentSms::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type auth.CodeType: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}