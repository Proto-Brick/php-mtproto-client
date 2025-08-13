<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PaidReactionPrivacy
 */
abstract class AbstractPaidReactionPrivacy extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PaidReactionPrivacyDefault::CONSTRUCTOR_ID => PaidReactionPrivacyDefault::deserialize($stream),
            PaidReactionPrivacyAnonymous::CONSTRUCTOR_ID => PaidReactionPrivacyAnonymous::deserialize($stream),
            PaidReactionPrivacyPeer::CONSTRUCTOR_ID => PaidReactionPrivacyPeer::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PaidReactionPrivacy. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}