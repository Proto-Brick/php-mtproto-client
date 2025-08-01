<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/invoice
 */
final class Invoice extends AbstractInvoice
{
    public const CONSTRUCTOR_ID = 77522308;
    
    public string $_ = 'invoice';
    
    /**
     * @param string $currency
     * @param list<AbstractLabeledPrice> $prices
     * @param bool|null $test
     * @param bool|null $nameRequested
     * @param bool|null $phoneRequested
     * @param bool|null $emailRequested
     * @param bool|null $shippingAddressRequested
     * @param bool|null $flexible
     * @param bool|null $phoneToProvider
     * @param bool|null $emailToProvider
     * @param bool|null $recurring
     * @param int|null $maxTipAmount
     * @param list<int>|null $suggestedTipAmounts
     * @param string|null $termsUrl
     * @param int|null $subscriptionPeriod
     */
    public function __construct(
        public readonly string $currency,
        public readonly array $prices,
        public readonly ?bool $test = null,
        public readonly ?bool $nameRequested = null,
        public readonly ?bool $phoneRequested = null,
        public readonly ?bool $emailRequested = null,
        public readonly ?bool $shippingAddressRequested = null,
        public readonly ?bool $flexible = null,
        public readonly ?bool $phoneToProvider = null,
        public readonly ?bool $emailToProvider = null,
        public readonly ?bool $recurring = null,
        public readonly ?int $maxTipAmount = null,
        public readonly ?array $suggestedTipAmounts = null,
        public readonly ?string $termsUrl = null,
        public readonly ?int $subscriptionPeriod = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->test) $flags |= (1 << 0);
        if ($this->nameRequested) $flags |= (1 << 1);
        if ($this->phoneRequested) $flags |= (1 << 2);
        if ($this->emailRequested) $flags |= (1 << 3);
        if ($this->shippingAddressRequested) $flags |= (1 << 4);
        if ($this->flexible) $flags |= (1 << 5);
        if ($this->phoneToProvider) $flags |= (1 << 6);
        if ($this->emailToProvider) $flags |= (1 << 7);
        if ($this->recurring) $flags |= (1 << 9);
        if ($this->maxTipAmount !== null) $flags |= (1 << 8);
        if ($this->suggestedTipAmounts !== null) $flags |= (1 << 8);
        if ($this->termsUrl !== null) $flags |= (1 << 10);
        if ($this->subscriptionPeriod !== null) $flags |= (1 << 11);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->vectorOfObjects($this->prices);
        if ($flags & (1 << 8)) {
            $buffer .= $serializer->int64($this->maxTipAmount);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $serializer->vectorOfLongs($this->suggestedTipAmounts);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->bytes($this->termsUrl);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->int32($this->subscriptionPeriod);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $test = ($flags & (1 << 0)) ? true : null;
        $nameRequested = ($flags & (1 << 1)) ? true : null;
        $phoneRequested = ($flags & (1 << 2)) ? true : null;
        $emailRequested = ($flags & (1 << 3)) ? true : null;
        $shippingAddressRequested = ($flags & (1 << 4)) ? true : null;
        $flexible = ($flags & (1 << 5)) ? true : null;
        $phoneToProvider = ($flags & (1 << 6)) ? true : null;
        $emailToProvider = ($flags & (1 << 7)) ? true : null;
        $recurring = ($flags & (1 << 9)) ? true : null;
        $currency = $deserializer->bytes($stream);
        $prices = $deserializer->vectorOfObjects($stream, [AbstractLabeledPrice::class, 'deserialize']);
        $maxTipAmount = ($flags & (1 << 8)) ? $deserializer->int64($stream) : null;
        $suggestedTipAmounts = ($flags & (1 << 8)) ? $deserializer->vectorOfLongs($stream) : null;
        $termsUrl = ($flags & (1 << 10)) ? $deserializer->bytes($stream) : null;
        $subscriptionPeriod = ($flags & (1 << 11)) ? $deserializer->int32($stream) : null;
            return new self(
            $currency,
            $prices,
            $test,
            $nameRequested,
            $phoneRequested,
            $emailRequested,
            $shippingAddressRequested,
            $flexible,
            $phoneToProvider,
            $emailToProvider,
            $recurring,
            $maxTipAmount,
            $suggestedTipAmounts,
            $termsUrl,
            $subscriptionPeriod
        );
    }
}