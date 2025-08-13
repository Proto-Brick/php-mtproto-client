<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputInvoice
 */
abstract class AbstractInputInvoice extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputInvoiceMessage::CONSTRUCTOR_ID => InputInvoiceMessage::deserialize($stream),
            InputInvoiceSlug::CONSTRUCTOR_ID => InputInvoiceSlug::deserialize($stream),
            InputInvoicePremiumGiftCode::CONSTRUCTOR_ID => InputInvoicePremiumGiftCode::deserialize($stream),
            InputInvoiceStars::CONSTRUCTOR_ID => InputInvoiceStars::deserialize($stream),
            InputInvoiceChatInviteSubscription::CONSTRUCTOR_ID => InputInvoiceChatInviteSubscription::deserialize($stream),
            InputInvoiceStarGift::CONSTRUCTOR_ID => InputInvoiceStarGift::deserialize($stream),
            InputInvoiceStarGiftUpgrade::CONSTRUCTOR_ID => InputInvoiceStarGiftUpgrade::deserialize($stream),
            InputInvoiceStarGiftTransfer::CONSTRUCTOR_ID => InputInvoiceStarGiftTransfer::deserialize($stream),
            InputInvoicePremiumGiftStars::CONSTRUCTOR_ID => InputInvoicePremiumGiftStars::deserialize($stream),
            InputInvoiceBusinessBotTransferStars::CONSTRUCTOR_ID => InputInvoiceBusinessBotTransferStars::deserialize($stream),
            InputInvoiceStarGiftResale::CONSTRUCTOR_ID => InputInvoiceStarGiftResale::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputInvoice. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}