<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumGiftOption
 */
final class PremiumGiftOption extends AbstractPremiumGiftOption
{
    public const CONSTRUCTOR_ID = 1958953753;
    
    public string $_ = 'premiumGiftOption';
    
    /**
     * @param int $months
     * @param string $currency
     * @param int $amount
     * @param string $botUrl
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $months,
        public readonly string $currency,
        public readonly int $amount,
        public readonly string $botUrl,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

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
            $storeProduct
        );
    }
}