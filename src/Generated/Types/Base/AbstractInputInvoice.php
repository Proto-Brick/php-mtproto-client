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
            0xc5b56859 => InputInvoiceMessage::deserialize($stream),
            0xc326caef => InputInvoiceSlug::deserialize($stream),
            0x98986c0d => InputInvoicePremiumGiftCode::deserialize($stream),
            0x65f00ce3 => InputInvoiceStars::deserialize($stream),
            0x34e793f1 => InputInvoiceChatInviteSubscription::deserialize($stream),
            0xe8625e92 => InputInvoiceStarGift::deserialize($stream),
            0x4d818d5d => InputInvoiceStarGiftUpgrade::deserialize($stream),
            0x4a5f5bd9 => InputInvoiceStarGiftTransfer::deserialize($stream),
            0xdabab2ef => InputInvoicePremiumGiftStars::deserialize($stream),
            0xf4997e42 => InputInvoiceBusinessBotTransferStars::deserialize($stream),
            0xc39f5324 => InputInvoiceStarGiftResale::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputInvoice. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}