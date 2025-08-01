<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionPaymentSentMe
 */
final class MessageActionPaymentSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 4288679116;
    
    public string $_ = 'messageActionPaymentSentMe';
    
    /**
     * @param string $currency
     * @param int $totalAmount
     * @param string $payload
     * @param AbstractPaymentCharge $charge
     * @param bool|null $recurringInit
     * @param bool|null $recurringUsed
     * @param AbstractPaymentRequestedInfo|null $info
     * @param string|null $shippingOptionId
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly string $payload,
        public readonly AbstractPaymentCharge $charge,
        public readonly ?bool $recurringInit = null,
        public readonly ?bool $recurringUsed = null,
        public readonly ?AbstractPaymentRequestedInfo $info = null,
        public readonly ?string $shippingOptionId = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->recurringInit) $flags |= (1 << 2);
        if ($this->recurringUsed) $flags |= (1 << 3);
        if ($this->info !== null) $flags |= (1 << 0);
        if ($this->shippingOptionId !== null) $flags |= (1 << 1);
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        $buffer .= $serializer->bytes($this->payload);
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->shippingOptionId);
        }
        $buffer .= $this->charge->serialize($serializer);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $recurringInit = ($flags & (1 << 2)) ? true : null;
        $recurringUsed = ($flags & (1 << 3)) ? true : null;
        $currency = $deserializer->bytes($stream);
        $totalAmount = $deserializer->int64($stream);
        $payload = $deserializer->bytes($stream);
        $info = ($flags & (1 << 0)) ? AbstractPaymentRequestedInfo::deserialize($deserializer, $stream) : null;
        $shippingOptionId = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $charge = AbstractPaymentCharge::deserialize($deserializer, $stream);
        $subscriptionUntilDate = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
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