<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaInvoice
 */
final class MessageMediaInvoice extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xf6a548d3;
    
    public string $predicate = 'messageMediaInvoice';
    
    /**
     * @param string $title
     * @param string $description
     * @param string $currency
     * @param int $totalAmount
     * @param string $startParam
     * @param true|null $shippingAddressRequested
     * @param true|null $test
     * @param AbstractWebDocument|null $photo
     * @param int|null $receiptMsgId
     * @param AbstractMessageExtendedMedia|null $extendedMedia
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $startParam,
        public readonly ?true $shippingAddressRequested = null,
        public readonly ?true $test = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?int $receiptMsgId = null,
        public readonly ?AbstractMessageExtendedMedia $extendedMedia = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->shippingAddressRequested) {
            $flags |= (1 << 1);
        }
        if ($this->test) {
            $flags |= (1 << 3);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->receiptMsgId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->extendedMedia !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->description);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->receiptMsgId);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        $buffer .= Serializer::bytes($this->startParam);
        if ($flags & (1 << 4)) {
            $buffer .= $this->extendedMedia->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $shippingAddressRequested = (($flags & (1 << 1)) !== 0) ? true : null;
        $test = (($flags & (1 << 3)) !== 0) ? true : null;
        $title = Deserializer::bytes($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);
        $photo = (($flags & (1 << 0)) !== 0) ? AbstractWebDocument::deserialize($__payload, $__offset) : null;
        $receiptMsgId = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $totalAmount = Deserializer::int64($__payload, $__offset);
        $startParam = Deserializer::bytes($__payload, $__offset);
        $extendedMedia = (($flags & (1 << 4)) !== 0) ? AbstractMessageExtendedMedia::deserialize($__payload, $__offset) : null;

        return new self(
            $title,
            $description,
            $currency,
            $totalAmount,
            $startParam,
            $shippingAddressRequested,
            $test,
            $photo,
            $receiptMsgId,
            $extendedMedia
        );
    }
}