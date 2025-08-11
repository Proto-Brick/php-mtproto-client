<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionPaymentRefunded
 */
final class MessageActionPaymentRefunded extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x41b3e202;
    
    public string $_ = 'messageActionPaymentRefunded';
    
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
        if ($this->payload !== null) $flags |= (1 << 0);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $peer = AbstractPeer::deserialize($stream);
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        $payload = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $charge = PaymentCharge::deserialize($stream);
        return new self(
            $peer,
            $currency,
            $totalAmount,
            $charge,
            $payload
        );
    }
}