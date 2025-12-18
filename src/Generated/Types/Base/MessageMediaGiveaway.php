<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaGiveaway
 */
final class MessageMediaGiveaway extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xaa073beb;
    
    public string $predicate = 'messageMediaGiveaway';
    
    /**
     * @param list<int> $channels
     * @param int $quantity
     * @param int $untilDate
     * @param true|null $onlyNewSubscribers
     * @param true|null $winnersAreVisible
     * @param list<string>|null $countriesIso2
     * @param string|null $prizeDescription
     * @param int|null $months
     * @param int|null $stars
     */
    public function __construct(
        public readonly array $channels,
        public readonly int $quantity,
        public readonly int $untilDate,
        public readonly ?true $onlyNewSubscribers = null,
        public readonly ?true $winnersAreVisible = null,
        public readonly ?array $countriesIso2 = null,
        public readonly ?string $prizeDescription = null,
        public readonly ?int $months = null,
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) {
            $flags |= (1 << 0);
        }
        if ($this->winnersAreVisible) {
            $flags |= (1 << 2);
        }
        if ($this->countriesIso2 !== null) {
            $flags |= (1 << 1);
        }
        if ($this->prizeDescription !== null) {
            $flags |= (1 << 3);
        }
        if ($this->months !== null) {
            $flags |= (1 << 4);
        }
        if ($this->stars !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfLongs($this->channels);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfStrings($this->countriesIso2);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->prizeDescription);
        }
        $buffer .= Serializer::int32($this->quantity);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->months);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int64($this->stars);
        }
        $buffer .= Serializer::int32($this->untilDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $onlyNewSubscribers = (($flags & (1 << 0)) !== 0) ? true : null;
        $winnersAreVisible = (($flags & (1 << 2)) !== 0) ? true : null;
        $channels = Deserializer::vectorOfLongs($__payload, $__offset);
        $countriesIso2 = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfStrings($__payload, $__offset) : null;
        $prizeDescription = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $quantity = Deserializer::int32($__payload, $__offset);
        $months = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $stars = (($flags & (1 << 5)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $untilDate = Deserializer::int32($__payload, $__offset);

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