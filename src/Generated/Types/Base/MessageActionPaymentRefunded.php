<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPaymentRefunded
 */
final class MessageActionPaymentRefunded extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x41b3e202;
    
    public string $predicate = 'messageActionPaymentRefunded';
    
    /**
     * @param AbstractPeer $peer
     * @param string $currency
     * @param int $totalAmount
     * @param PaymentCharge $charge
     * @param string|null $payload
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly PaymentCharge $charge,
        public readonly ?string $payload = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->payload !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->payload);
        }
        $buffer .= $this->charge->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $totalAmount = Deserializer::int64($__payload, $__offset);
        $payload = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $charge = PaymentCharge::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $currency,
            $totalAmount,
            $charge,
            $payload
        );
    }
}