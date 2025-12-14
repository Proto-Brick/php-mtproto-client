<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPaymentSentMe
 */
final class MessageActionPaymentSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xffa00ccc;
    
    public string $predicate = 'messageActionPaymentSentMe';
    
    /**
     * @param string $currency
     * @param int $totalAmount
     * @param string $payload
     * @param PaymentCharge $charge
     * @param true|null $recurringInit
     * @param true|null $recurringUsed
     * @param PaymentRequestedInfo|null $info
     * @param string|null $shippingOptionId
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $payload,
        public readonly PaymentCharge $charge,
        public readonly ?true $recurringInit = null,
        public readonly ?true $recurringUsed = null,
        public readonly ?PaymentRequestedInfo $info = null,
        public readonly ?string $shippingOptionId = null,
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
        if ($this->info !== null) {
            $flags |= (1 << 0);
        }
        if ($this->shippingOptionId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->subscriptionUntilDate !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        $buffer .= Serializer::bytes($this->payload);
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->shippingOptionId);
        }
        $buffer .= $this->charge->serialize();
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $recurringInit = (($flags & (1 << 2)) !== 0) ? true : null;
        $recurringUsed = (($flags & (1 << 3)) !== 0) ? true : null;
        $currency = Deserializer::bytes($stream);
        $totalAmount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $payload = Deserializer::bytes($stream);
        $info = (($flags & (1 << 0)) !== 0) ? PaymentRequestedInfo::deserialize($stream) : null;
        $shippingOptionId = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $charge = PaymentCharge::deserialize($stream);
        $subscriptionUntilDate = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $currency,
            $totalAmount,
            $payload,
            $charge,
            $recurringInit,
            $recurringUsed,
            $info,
            $shippingOptionId,
            $subscriptionUntilDate
        );
    }
}