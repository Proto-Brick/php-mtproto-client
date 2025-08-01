<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsGiveawayOption
 */
final class StarsGiveawayOption extends AbstractStarsGiveawayOption
{
    public const CONSTRUCTOR_ID = 2496562474;
    
    public string $_ = 'starsGiveawayOption';
    
    /**
     * @param int $stars
     * @param int $yearlyBoosts
     * @param string $currency
     * @param int $amount
     * @param list<AbstractStarsGiveawayWinnersOption> $winners
     * @param bool|null $extended
     * @param bool|null $default_
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $stars,
        public readonly int $yearlyBoosts,
        public readonly string $currency,
        public readonly int $amount,
        public readonly array $winners,
        public readonly ?bool $extended = null,
        public readonly ?bool $default_ = null,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->extended) $flags |= (1 << 0);
        if ($this->default_) $flags |= (1 << 1);
        if ($this->storeProduct !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->stars);
        $buffer .= $serializer->int32($this->yearlyBoosts);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->storeProduct);
        }
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->vectorOfObjects($this->winners);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $extended = ($flags & (1 << 0)) ? true : null;
        $default_ = ($flags & (1 << 1)) ? true : null;
        $stars = $deserializer->int64($stream);
        $yearlyBoosts = $deserializer->int32($stream);
        $storeProduct = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        $winners = $deserializer->vectorOfObjects($stream, [AbstractStarsGiveawayWinnersOption::class, 'deserialize']);
            return new self(
            $stars,
            $yearlyBoosts,
            $currency,
            $amount,
            $winners,
            $extended,
            $default_,
            $storeProduct
        );
    }
}