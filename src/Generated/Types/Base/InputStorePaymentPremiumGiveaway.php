<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentPremiumGiveaway
 */
final class InputStorePaymentPremiumGiveaway extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x160544ca;
    
    public string $predicate = 'inputStorePaymentPremiumGiveaway';
    
    /**
     * @param AbstractInputPeer $boostPeer
     * @param int $randomId
     * @param int $untilDate
     * @param string $currency
     * @param int $amount
     * @param true|null $onlyNewSubscribers
     * @param true|null $winnersAreVisible
     * @param list<AbstractInputPeer>|null $additionalPeers
     * @param list<string>|null $countriesIso2
     * @param string|null $prizeDescription
     */
    public function __construct(
        public readonly AbstractInputPeer $boostPeer,
        public readonly int $randomId,
        public readonly int $untilDate,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?true $onlyNewSubscribers = null,
        public readonly ?true $winnersAreVisible = null,
        public readonly ?array $additionalPeers = null,
        public readonly ?array $countriesIso2 = null,
        public readonly ?string $prizeDescription = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) {
            $flags |= (1 << 0);
        }
        if ($this->winnersAreVisible) {
            $flags |= (1 << 3);
        }
        if ($this->additionalPeers !== null) {
            $flags |= (1 << 1);
        }
        if ($this->countriesIso2 !== null) {
            $flags |= (1 << 2);
        }
        if ($this->prizeDescription !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->boostPeer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->additionalPeers);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfStrings($this->countriesIso2);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->prizeDescription);
        }
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::int32($this->untilDate);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $onlyNewSubscribers = (($flags & (1 << 0)) !== 0) ? true : null;
        $winnersAreVisible = (($flags & (1 << 3)) !== 0) ? true : null;
        $boostPeer = AbstractInputPeer::deserialize($__payload, $__offset);
        $additionalPeers = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputPeer::class, 'deserialize']) : null;
        $countriesIso2 = (($flags & (1 << 2)) !== 0) ? Deserializer::vectorOfStrings($__payload, $__offset) : null;
        $prizeDescription = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $randomId = Deserializer::int64($__payload, $__offset);
        $untilDate = Deserializer::int32($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $boostPeer,
            $randomId,
            $untilDate,
            $currency,
            $amount,
            $onlyNewSubscribers,
            $winnersAreVisible,
            $additionalPeers,
            $countriesIso2,
            $prizeDescription
        );
    }
}