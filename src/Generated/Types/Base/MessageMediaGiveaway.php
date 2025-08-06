<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaGiveaway
 */
final class MessageMediaGiveaway extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xaa073beb;
    
    public string $_ = 'messageMediaGiveaway';
    
    /**
     * @param list<int> $channels
     * @param int $quantity
     * @param int $untilDate
     * @param bool|null $onlyNewSubscribers
     * @param bool|null $winnersAreVisible
     * @param list<string>|null $countriesIso2
     * @param string|null $prizeDescription
     * @param int|null $months
     * @param int|null $stars
     */
    public function __construct(
        public readonly array $channels,
        public readonly int $quantity,
        public readonly int $untilDate,
        public readonly ?bool $onlyNewSubscribers = null,
        public readonly ?bool $winnersAreVisible = null,
        public readonly ?array $countriesIso2 = null,
        public readonly ?string $prizeDescription = null,
        public readonly ?int $months = null,
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) $flags |= (1 << 0);
        if ($this->winnersAreVisible) $flags |= (1 << 2);
        if ($this->countriesIso2 !== null) $flags |= (1 << 1);
        if ($this->prizeDescription !== null) $flags |= (1 << 3);
        if ($this->months !== null) $flags |= (1 << 4);
        if ($this->stars !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfLongs($this->channels);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfStrings($this->countriesIso2);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->prizeDescription);
        }
        $buffer .= $serializer->int32($this->quantity);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->months);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int64($this->stars);
        }
        $buffer .= $serializer->int32($this->untilDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $onlyNewSubscribers = ($flags & (1 << 0)) ? true : null;
        $winnersAreVisible = ($flags & (1 << 2)) ? true : null;
        $channels = $deserializer->vectorOfLongs($stream);
        $countriesIso2 = ($flags & (1 << 1)) ? $deserializer->vectorOfStrings($stream) : null;
        $prizeDescription = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $quantity = $deserializer->int32($stream);
        $months = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $stars = ($flags & (1 << 5)) ? $deserializer->int64($stream) : null;
        $untilDate = $deserializer->int32($stream);
        return new self(
            $channels,
            $quantity,
            $untilDate,
            $onlyNewSubscribers,
            $winnersAreVisible,
            $countriesIso2,
            $prizeDescription,
            $months,
            $stars
        );
    }
}