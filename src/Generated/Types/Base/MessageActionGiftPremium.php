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
    public const CONSTRUCTOR_ID = 0x6c6274fa;
    
    public string $_ = 'messageActionGiftPremium';
    
    /**
     * @param string $currency
     * @param int $amount
     * @param int $months
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
        public readonly int $months,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cryptoCurrency !== null) $flags |= (1 << 0);
        if ($this->cryptoAmount !== null) $flags |= (1 << 0);
        if ($this->message !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->cryptoAmount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        $months = Deserializer::int32($stream);
        $cryptoCurrency = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $cryptoAmount = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $message = ($flags & (1 << 1)) ? TextWithEntities::deserialize($stream) : null;
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