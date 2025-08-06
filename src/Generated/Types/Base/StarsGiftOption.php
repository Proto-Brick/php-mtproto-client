<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsGiftOption
 */
final class StarsGiftOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5e0589f1;
    
    public string $_ = 'starsGiftOption';
    
    /**
     * @param int $stars
     * @param string $currency
     * @param int $amount
     * @param bool|null $extended
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?bool $extended = null,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->extended) $flags |= (1 << 1);
        if ($this->storeProduct !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->storeProduct);
        }
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $extended = ($flags & (1 << 1)) ? true : null;
        $stars = $deserializer->int64($stream);
        $storeProduct = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        return new self(
            $stars,
            $currency,
            $amount,
            $extended,
            $storeProduct
        );
    }
}