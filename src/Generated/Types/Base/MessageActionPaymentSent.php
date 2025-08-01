<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionPaymentSent
 */
final class MessageActionPaymentSent extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 3324293486;
    
    public string $_ = 'messageActionPaymentSent';
    
    /**
     * @param string $currency
     * @param int $totalAmount
     * @param bool|null $recurringInit
     * @param bool|null $recurringUsed
     * @param string|null $invoiceSlug
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly ?bool $recurringInit = null,
        public readonly ?bool $recurringUsed = null,
        public readonly ?string $invoiceSlug = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->recurringInit) $flags |= (1 << 2);
        if ($this->recurringUsed) $flags |= (1 << 3);
        if ($this->invoiceSlug !== null) $flags |= (1 << 0);
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->totalAmount);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->invoiceSlug);
        }
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
        $invoiceSlug = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $subscriptionUntilDate = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
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