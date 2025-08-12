<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/auth.SentCodeType
 */
abstract class AbstractSentCodeType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            SentCodeTypeApp::CONSTRUCTOR_ID => SentCodeTypeApp::deserialize($stream),
            SentCodeTypeSms::CONSTRUCTOR_ID => SentCodeTypeSms::deserialize($stream),
            SentCodeTypeCall::CONSTRUCTOR_ID => SentCodeTypeCall::deserialize($stream),
            SentCodeTypeFlashCall::CONSTRUCTOR_ID => SentCodeTypeFlashCall::deserialize($stream),
            SentCodeTypeMissedCall::CONSTRUCTOR_ID => SentCodeTypeMissedCall::deserialize($stream),
            SentCodeTypeEmailCode::CONSTRUCTOR_ID => SentCodeTypeEmailCode::deserialize($stream),
            SentCodeTypeSetUpEmailRequired::CONSTRUCTOR_ID => SentCodeTypeSetUpEmailRequired::deserialize($stream),
            SentCodeTypeFragmentSms::CONSTRUCTOR_ID => SentCodeTypeFragmentSms::deserialize($stream),
            SentCodeTypeFirebaseSms::CONSTRUCTOR_ID => SentCodeTypeFirebaseSms::deserialize($stream),
            SentCodeTypeSmsWord::CONSTRUCTOR_ID => SentCodeTypeSmsWord::deserialize($stream),
            SentCodeTypeSmsPhrase::CONSTRUCTOR_ID => SentCodeTypeSmsPhrase::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type auth.SentCodeType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}