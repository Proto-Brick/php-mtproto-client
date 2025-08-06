<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStorePaymentPremiumGiveaway
 */
final class InputStorePaymentPremiumGiveaway extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x160544ca;
    
    public string $_ = 'inputStorePaymentPremiumGiveaway';
    
    /**
     * @param AbstractInputPeer $boostPeer
     * @param int $randomId
     * @param int $untilDate
     * @param string $currency
     * @param int $amount
     * @param bool|null $onlyNewSubscribers
     * @param bool|null $winnersAreVisible
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
        public readonly ?bool $onlyNewSubscribers = null,
        public readonly ?bool $winnersAreVisible = null,
        public readonly ?array $additionalPeers = null,
        public readonly ?array $countriesIso2 = null,
        public readonly ?string $prizeDescription = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) $flags |= (1 << 0);
        if ($this->winnersAreVisible) $flags |= (1 << 3);
        if ($this->additionalPeers !== null) $flags |= (1 << 1);
        if ($this->countriesIso2 !== null) $flags |= (1 << 2);
        if ($this->prizeDescription !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->boostPeer->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->additionalPeers);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->vectorOfStrings($this->countriesIso2);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->prizeDescription);
        }
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->int32($this->untilDate);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $onlyNewSubscribers = ($flags & (1 << 0)) ? true : null;
        $winnersAreVisible = ($flags & (1 << 3)) ? true : null;
        $boostPeer = AbstractInputPeer::deserialize($deserializer, $stream);
        $additionalPeers = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']) : null;
        $countriesIso2 = ($flags & (1 << 2)) ? $deserializer->vectorOfStrings($stream) : null;
        $prizeDescription = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $randomId = $deserializer->int64($stream);
        $untilDate = $deserializer->int32($stream);
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
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