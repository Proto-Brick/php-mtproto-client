<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputInvoice
 */
abstract class AbstractInputInvoice extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputInvoiceMessage::CONSTRUCTOR_ID => InputInvoiceMessage::deserialize($deserializer, $stream),
            InputInvoiceSlug::CONSTRUCTOR_ID => InputInvoiceSlug::deserialize($deserializer, $stream),
            InputInvoicePremiumGiftCode::CONSTRUCTOR_ID => InputInvoicePremiumGiftCode::deserialize($deserializer, $stream),
            InputInvoiceStars::CONSTRUCTOR_ID => InputInvoiceStars::deserialize($deserializer, $stream),
            InputInvoiceChatInviteSubscription::CONSTRUCTOR_ID => InputInvoiceChatInviteSubscription::deserialize($deserializer, $stream),
            InputInvoiceStarGift::CONSTRUCTOR_ID => InputInvoiceStarGift::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputInvoice. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}