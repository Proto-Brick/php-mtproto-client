<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumGiftOption
 */
final class PremiumGiftOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x74c34319;
    
    public string $predicate = 'premiumGiftOption';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
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
            $storeProduct
        );
    }
}