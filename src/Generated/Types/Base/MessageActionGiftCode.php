<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGiftCode
 */
final class MessageActionGiftCode extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 1456486804;
    
    public string $_ = 'messageActionGiftCode';
    
    /**
     * @param int $months
     * @param string $slug
     * @param bool|null $viaGiveaway
     * @param bool|null $unclaimed
     * @param AbstractPeer|null $boostPeer
     * @param string|null $currency
     * @param int|null $amount
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param AbstractTextWithEntities|null $message
     */
    public function __construct(
        public readonly int $months,
        public readonly string $slug,
        public readonly ?bool $viaGiveaway = null,
        public readonly ?bool $unclaimed = null,
        public readonly ?AbstractPeer $boostPeer = null,
        public readonly ?string $currency = null,
        public readonly ?int $amount = null,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?AbstractTextWithEntities $message = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaGiveaway) $flags |= (1 << 0);
        if ($this->unclaimed) $flags |= (1 << 5);
        if ($this->boostPeer !== null) $flags |= (1 << 1);
        if ($this->currency !== null) $flags |= (1 << 2);
        if ($this->amount !== null) $flags |= (1 << 2);
        if ($this->cryptoCurrency !== null) $flags |= (1 << 3);
        if ($this->cryptoAmount !== null) $flags |= (1 << 3);
        if ($this->message !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $this->boostPeer->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->months);
        $buffer .= $serializer->bytes($this->slug);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->currency);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int64($this->amount);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int64($this->cryptoAmount);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->message->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $viaGiveaway = ($flags & (1 << 0)) ? true : null;
        $unclaimed = ($flags & (1 << 5)) ? true : null;
        $boostPeer = ($flags & (1 << 1)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $months = $deserializer->int32($stream);
        $slug = $deserializer->bytes($stream);
        $currency = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $amount = ($flags & (1 << 2)) ? $deserializer->int64($stream) : null;
        $cryptoCurrency = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $cryptoAmount = ($flags & (1 << 3)) ? $deserializer->int64($stream) : null;
        $message = ($flags & (1 << 4)) ? AbstractTextWithEntities::deserialize($deserializer, $stream) : null;
            return new self(
            $months,
            $slug,
            $viaGiveaway,
            $unclaimed,
            $boostPeer,
            $currency,
            $amount,
            $cryptoCurrency,
            $cryptoAmount,
            $message
        );
    }
}