<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGiftPremium
 */
final class MessageActionGiftPremium extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 1818391802;
    
    public string $_ = 'messageActionGiftPremium';
    
    /**
     * @param string $currency
     * @param int $amount
     * @param int $months
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param AbstractTextWithEntities|null $message
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
        public readonly int $months,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?AbstractTextWithEntities $message = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cryptoCurrency !== null) $flags |= (1 << 0);
        if ($this->cryptoAmount !== null) $flags |= (1 << 0);
        if ($this->message !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->cryptoAmount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        $months = $deserializer->int32($stream);
        $cryptoCurrency = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $cryptoAmount = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $message = ($flags & (1 << 1)) ? AbstractTextWithEntities::deserialize($deserializer, $stream) : null;
            return new self(
            $currency,
            $amount,
            $months,
            $cryptoCurrency,
            $cryptoAmount,
            $message
        );
    }
}