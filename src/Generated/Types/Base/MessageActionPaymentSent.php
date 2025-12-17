<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPaymentSent
 */
final class MessageActionPaymentSent extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xc624b16e;
    
    public string $predicate = 'messageActionPaymentSent';
    
    /**
     * @param string $currency
     * @param int $totalAmount
     * @param true|null $recurringInit
     * @param true|null $recurringUsed
     * @param string|null $invoiceSlug
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly ?true $recurringInit = null,
        public readonly ?true $recurringUsed = null,
        public readonly ?string $invoiceSlug = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->recurringInit) {
            $flags |= (1 << 2);
        }
        if ($this->recurringUsed) {
            $flags |= (1 << 3);
        }
        if ($this->invoiceSlug !== null) {
            $flags |= (1 << 0);
        }
        if ($this->subscriptionUntilDate !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->invoiceSlug);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $recurringInit = (($flags & (1 << 2)) !== 0) ? true : null;
        $recurringUsed = (($flags & (1 << 3)) !== 0) ? true : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $totalAmount = Deserializer::int64($__payload, $__offset);
        $invoiceSlug = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $subscriptionUntilDate = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $currency,
            $totalAmount,
            $recurringInit,
            $recurringUsed,
            $invoiceSlug,
            $subscriptionUntilDate
        );
    }
}