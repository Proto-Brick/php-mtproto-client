<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumSubscriptionOption
 */
final class PremiumSubscriptionOption extends AbstractPremiumSubscriptionOption
{
    public const CONSTRUCTOR_ID = 1596792306;
    
    public string $_ = 'premiumSubscriptionOption';
    
    /**
     * @param int $months
     * @param string $currency
     * @param int $amount
     * @param string $botUrl
     * @param bool|null $current
     * @param bool|null $canPurchaseUpgrade
     * @param string|null $transaction
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $months,
        public readonly string $currency,
        public readonly int $amount,
        public readonly string $botUrl,
        public readonly ?bool $current = null,
        public readonly ?bool $canPurchaseUpgrade = null,
        public readonly ?string $transaction = null,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->current) $flags |= (1 << 1);
        if ($this->canPurchaseUpgrade) $flags |= (1 << 2);
        if ($this->transaction !== null) $flags |= (1 << 3);
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->transaction);
        }
        $buffer .= $serializer->int32($this->months);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->bytes($this->botUrl);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->storeProduct);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $current = ($flags & (1 << 1)) ? true : null;
        $canPurchaseUpgrade = ($flags & (1 << 2)) ? true : null;
        $transaction = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $months = $deserializer->int32($stream);
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        $botUrl = $deserializer->bytes($stream);
        $storeProduct = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
            return new self(
            $months,
            $currency,
            $amount,
            $botUrl,
            $current,
            $canPurchaseUpgrade,
            $transaction,
            $storeProduct
        );
    }
}