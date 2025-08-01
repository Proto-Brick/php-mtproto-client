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
    public const CONSTRUCTOR_ID = 1102307842;
    
    public string $_ = 'messageActionPaymentRefunded';
    
    /**
     * @param AbstractPeer $peer
     * @param string $currency
     * @param int $totalAmount
     * @param AbstractPaymentCharge $charge
     * @param string|null $payload
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly AbstractPaymentCharge $charge,
        public readonly ?string $payload = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->payload !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->payload);
        }
        $buffer .= $this->charge->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $currency = $deserializer->bytes($stream);
        $totalAmount = $deserializer->int64($stream);
        $payload = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $charge = AbstractPaymentCharge::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $currency,
            $totalAmount,
            $charge,
            $payload
        );
    }
}