<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGiftTon
 */
final class MessageActionGiftTon extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xa8a3c699;
    
    public string $predicate = 'messageActionGiftTon';
    
    /**
     * @param string $currency
     * @param int $amount
     * @param string $cryptoCurrency
     * @param int $cryptoAmount
     * @param string|null $transactionId
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
        public readonly string $cryptoCurrency,
        public readonly int $cryptoAmount,
        public readonly ?string $transactionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->transactionId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::bytes($this->cryptoCurrency);
        $buffer .= Serializer::int64($this->cryptoAmount);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->transactionId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);
        $cryptoCurrency = Deserializer::bytes($__payload, $__offset);
        $cryptoAmount = Deserializer::int64($__payload, $__offset);
        $transactionId = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $currency,
            $amount,
            $cryptoCurrency,
            $cryptoAmount,
            $transactionId
        );
    }
}