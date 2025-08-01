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
    public const CONSTRUCTOR_ID = 1171632161;
    
    public string $_ = 'messageActionGiftStars';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cryptoCurrency !== null) $flags |= (1 << 0);
        if ($this->cryptoAmount !== null) $flags |= (1 << 0);
        if ($this->transactionId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->cryptoCurrency);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->cryptoAmount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->transactionId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        $stars = $deserializer->int64($stream);
        $cryptoCurrency = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $cryptoAmount = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $transactionId = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
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