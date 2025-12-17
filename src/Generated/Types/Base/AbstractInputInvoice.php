<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputInvoice
 */
abstract class AbstractInputInvoice extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xc5b56859 => InputInvoiceMessage::deserialize($__payload, $__offset),
            0xc326caef => InputInvoiceSlug::deserialize($__payload, $__offset),
            0x98986c0d => InputInvoicePremiumGiftCode::deserialize($__payload, $__offset),
            0x65f00ce3 => InputInvoiceStars::deserialize($__payload, $__offset),
            0x34e793f1 => InputInvoiceChatInviteSubscription::deserialize($__payload, $__offset),
            0xe8625e92 => InputInvoiceStarGift::deserialize($__payload, $__offset),
            0x4d818d5d => InputInvoiceStarGiftUpgrade::deserialize($__payload, $__offset),
            0x4a5f5bd9 => InputInvoiceStarGiftTransfer::deserialize($__payload, $__offset),
            0xdabab2ef => InputInvoicePremiumGiftStars::deserialize($__payload, $__offset),
            0xf4997e42 => InputInvoiceBusinessBotTransferStars::deserialize($__payload, $__offset),
            0xc39f5324 => InputInvoiceStarGiftResale::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputInvoice. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}