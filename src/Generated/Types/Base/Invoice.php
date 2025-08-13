<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/invoice
 */
final class Invoice extends TlObject
{
    public const CONSTRUCTOR_ID = 0x49ee584;
    
    public string $predicate = 'invoice';
    
    /**
     * @param string $currency
     * @param list<LabeledPrice> $prices
     * @param true|null $test
     * @param true|null $nameRequested
     * @param true|null $phoneRequested
     * @param true|null $emailRequested
     * @param true|null $shippingAddressRequested
     * @param true|null $flexible
     * @param true|null $phoneToProvider
     * @param true|null $emailToProvider
     * @param true|null $recurring
     * @param int|null $maxTipAmount
     * @param list<int>|null $suggestedTipAmounts
     * @param string|null $termsUrl
     * @param int|null $subscriptionPeriod
     */
    public function __construct(
        public readonly string $currency,
        public readonly array $prices,
        public readonly ?true $test = null,
        public readonly ?true $nameRequested = null,
        public readonly ?true $phoneRequested = null,
        public readonly ?true $emailRequested = null,
        public readonly ?true $shippingAddressRequested = null,
        public readonly ?true $flexible = null,
        public readonly ?true $phoneToProvider = null,
        public readonly ?true $emailToProvider = null,
        public readonly ?true $recurring = null,
        public readonly ?int $maxTipAmount = null,
        public readonly ?array $suggestedTipAmounts = null,
        public readonly ?string $termsUrl = null,
        public readonly ?int $subscriptionPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->test) {
            $flags |= (1 << 0);
        }
        if ($this->nameRequested) {
            $flags |= (1 << 1);
        }
        if ($this->phoneRequested) {
            $flags |= (1 << 2);
        }
        if ($this->emailRequested) {
            $flags |= (1 << 3);
        }
        if ($this->shippingAddressRequested) {
            $flags |= (1 << 4);
        }
        if ($this->flexible) {
            $flags |= (1 << 5);
        }
        if ($this->phoneToProvider) {
            $flags |= (1 << 6);
        }
        if ($this->emailToProvider) {
            $flags |= (1 << 7);
        }
        if ($this->recurring) {
            $flags |= (1 << 9);
        }
        if ($this->maxTipAmount !== null) {
            $flags |= (1 << 8);
        }
        if ($this->suggestedTipAmounts !== null) {
            $flags |= (1 << 8);
        }
        if ($this->termsUrl !== null) {
            $flags |= (1 << 10);
        }
        if ($this->subscriptionPeriod !== null) {
            $flags |= (1 << 11);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::vectorOfObjects($this->prices);
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->maxTipAmount);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::vectorOfLongs($this->suggestedTipAmounts);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::bytes($this->termsUrl);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int32($this->subscriptionPeriod);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $test = (($flags & (1 << 0)) !== 0) ? true : null;
        $nameRequested = (($flags & (1 << 1)) !== 0) ? true : null;
        $phoneRequested = (($flags & (1 << 2)) !== 0) ? true : null;
        $emailRequested = (($flags & (1 << 3)) !== 0) ? true : null;
        $shippingAddressRequested = (($flags & (1 << 4)) !== 0) ? true : null;
        $flexible = (($flags & (1 << 5)) !== 0) ? true : null;
        $phoneToProvider = (($flags & (1 << 6)) !== 0) ? true : null;
        $emailToProvider = (($flags & (1 << 7)) !== 0) ? true : null;
        $recurring = (($flags & (1 << 9)) !== 0) ? true : null;
        $currency = Deserializer::bytes($stream);
        $prices = Deserializer::vectorOfObjects($stream, [LabeledPrice::class, 'deserialize']);
        $maxTipAmount = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($stream) : null;
        $suggestedTipAmounts = (($flags & (1 << 8)) !== 0) ? Deserializer::vectorOfLongs($stream) : null;
        $termsUrl = (($flags & (1 << 10)) !== 0) ? Deserializer::bytes($stream) : null;
        $subscriptionPeriod = (($flags & (1 << 11)) !== 0) ? Deserializer::int32($stream) : null;

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