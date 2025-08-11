<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premiumGiftCodeOption
 */
final class PremiumGiftCodeOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x257e962b;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        if ($this->storeQuantity !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->users);
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->storeProduct);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->storeQuantity);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $users = Deserializer::int32($stream);
        $months = Deserializer::int32($stream);
        $storeProduct = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $storeQuantity = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
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