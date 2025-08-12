<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumSubscriptionOption
 */
final class PremiumSubscriptionOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5f2d1df2;
    
    public string $predicate = 'premiumSubscriptionOption';
    
    /**
     * @param int $months
     * @param string $currency
     * @param int $amount
     * @param string $botUrl
     * @param true|null $current
     * @param true|null $canPurchaseUpgrade
     * @param string|null $transaction
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $months,
        public readonly string $currency,
        public readonly int $amount,
        public readonly string $botUrl,
        public readonly ?true $current = null,
        public readonly ?true $canPurchaseUpgrade = null,
        public readonly ?string $transaction = null,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->current) $flags |= (1 << 1);
        if ($this->canPurchaseUpgrade) $flags |= (1 << 2);
        if ($this->transaction !== null) $flags |= (1 << 3);
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->transaction);
        }
        $buffer .= Serializer::int32($this->months);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::bytes($this->botUrl);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->storeProduct);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $current = ($flags & (1 << 1)) ? true : null;
        $canPurchaseUpgrade = ($flags & (1 << 2)) ? true : null;
        $transaction = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $months = Deserializer::int32($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        $botUrl = Deserializer::bytes($stream);
        $storeProduct = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;

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