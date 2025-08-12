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
        if ($this->recurringInit) $flags |= (1 << 2);
        if ($this->recurringUsed) $flags |= (1 << 3);
        if ($this->invoiceSlug !== null) $flags |= (1 << 0);
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 4);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $recurringInit = ($flags & (1 << 2)) ? true : null;
        $recurringUsed = ($flags & (1 << 3)) ? true : null;
        $currency = Deserializer::bytes($stream);
        $totalAmount = Deserializer::int64($stream);
        $invoiceSlug = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $subscriptionUntilDate = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;

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