<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGiftStars
 */
final class MessageActionGiftStars extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x45d5b021;
    
    public string $predicate = 'messageActionGiftStars';
    
    /**
     * @param string $currency
     * @param int $amount
     * @param int $stars
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param string|null $transactionId
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
        public readonly int $stars,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?string $transactionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cryptoCurrency !== null) $flags |= (1 << 0);
        if ($this->cryptoAmount !== null) $flags |= (1 << 0);
        if ($this->transactionId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->cryptoAmount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->transactionId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        $stars = Deserializer::int64($stream);
        $cryptoCurrency = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $cryptoAmount = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $transactionId = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;

        return new self(
            $currency,
            $amount,
            $stars,
            $cryptoCurrency,
            $cryptoAmount,
            $transactionId
        );
    }
}