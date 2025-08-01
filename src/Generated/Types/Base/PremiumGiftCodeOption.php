<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumGiftCodeOption
 */
final class PremiumGiftCodeOption extends AbstractPremiumGiftCodeOption
{
    public const CONSTRUCTOR_ID = 629052971;
    
    public string $_ = 'premiumGiftCodeOption';
    
    /**
     * @param int $users
     * @param int $months
     * @param string $currency
     * @param int $amount
     * @param string|null $storeProduct
     * @param int|null $storeQuantity
     */
    public function __construct(
        public readonly int $users,
        public readonly int $months,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?string $storeProduct = null,
        public readonly ?int $storeQuantity = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        if ($this->storeQuantity !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->users);
        $buffer .= $serializer->int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->storeProduct);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->storeQuantity);
        }
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $users = $deserializer->int32($stream);
        $months = $deserializer->int32($stream);
        $storeProduct = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $storeQuantity = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
            return new self(
            $users,
            $months,
            $currency,
            $amount,
            $storeProduct,
            $storeQuantity
        );
    }
}