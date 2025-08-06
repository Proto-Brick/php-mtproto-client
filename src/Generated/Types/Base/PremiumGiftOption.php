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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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