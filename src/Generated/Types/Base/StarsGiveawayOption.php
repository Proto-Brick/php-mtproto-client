<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsGiveawayOption
 */
final class StarsGiveawayOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x94ce852a;
    
    public string $_ = 'starsGiveawayOption';
    
    /**
     * @param int $stars
     * @param int $yearlyBoosts
     * @param string $currency
     * @param int $amount
     * @param list<StarsGiveawayWinnersOption> $winners
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->extended) $flags |= (1 << 0);
        if ($this->default_) $flags |= (1 << 1);
        if ($this->storeProduct !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::int32($this->yearlyBoosts);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->storeProduct);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::vectorOfObjects($this->winners);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $extended = ($flags & (1 << 0)) ? true : null;
        $default_ = ($flags & (1 << 1)) ? true : null;
        $stars = Deserializer::int64($stream);
        $yearlyBoosts = Deserializer::int32($stream);
        $storeProduct = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        $winners = Deserializer::vectorOfObjects($stream, [StarsGiveawayWinnersOption::class, 'deserialize']);
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