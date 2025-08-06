<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.SentCodeType
 */
abstract class AbstractSentCodeType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            SentCodeTypeApp::CONSTRUCTOR_ID => SentCodeTypeApp::deserialize($deserializer, $stream),
            SentCodeTypeSms::CONSTRUCTOR_ID => SentCodeTypeSms::deserialize($deserializer, $stream),
            SentCodeTypeCall::CONSTRUCTOR_ID => SentCodeTypeCall::deserialize($deserializer, $stream),
            SentCodeTypeFlashCall::CONSTRUCTOR_ID => SentCodeTypeFlashCall::deserialize($deserializer, $stream),
            SentCodeTypeMissedCall::CONSTRUCTOR_ID => SentCodeTypeMissedCall::deserialize($deserializer, $stream),
            SentCodeTypeEmailCode::CONSTRUCTOR_ID => SentCodeTypeEmailCode::deserialize($deserializer, $stream),
            SentCodeTypeSetUpEmailRequired::CONSTRUCTOR_ID => SentCodeTypeSetUpEmailRequired::deserialize($deserializer, $stream),
            SentCodeTypeFragmentSms::CONSTRUCTOR_ID => SentCodeTypeFragmentSms::deserialize($deserializer, $stream),
            SentCodeTypeFirebaseSms::CONSTRUCTOR_ID => SentCodeTypeFirebaseSms::deserialize($deserializer, $stream),
            SentCodeTypeSmsWord::CONSTRUCTOR_ID => SentCodeTypeSmsWord::deserialize($deserializer, $stream),
            SentCodeTypeSmsPhrase::CONSTRUCTOR_ID => SentCodeTypeSmsPhrase::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type auth.SentCodeType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}