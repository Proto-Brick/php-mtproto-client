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
            0x3dbb5986 => SentCodeTypeApp::deserialize($stream),
            0xc000bba2 => SentCodeTypeSms::deserialize($stream),
            0x5353e5a7 => SentCodeTypeCall::deserialize($stream),
            0xab03c6d9 => SentCodeTypeFlashCall::deserialize($stream),
            0x82006484 => SentCodeTypeMissedCall::deserialize($stream),
            0xf450f59b => SentCodeTypeEmailCode::deserialize($stream),
            0xa5491dea => SentCodeTypeSetUpEmailRequired::deserialize($stream),
            0xd9565c39 => SentCodeTypeFragmentSms::deserialize($stream),
            0x9fd736 => SentCodeTypeFirebaseSms::deserialize($stream),
            0xa416ac81 => SentCodeTypeSmsWord::deserialize($stream),
            0xb37794af => SentCodeTypeSmsPhrase::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type auth.SentCodeType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}