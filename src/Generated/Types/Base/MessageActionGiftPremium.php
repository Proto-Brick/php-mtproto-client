<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGiftPremium
 */
final class MessageActionGiftPremium extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x48e91302;
    
    public string $predicate = 'messageActionGiftPremium';
    
    /**
     * @param string $currency
     * @param int $amount
     * @param int $days
     * @param string|null $cryptoCurrency
     * @param int|null $cryptoAmount
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $amount,
        public readonly int $days,
        public readonly ?string $cryptoCurrency = null,
        public readonly ?int $cryptoAmount = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cryptoCurrency !== null) {
            $flags |= (1 << 0);
        }
        if ($this->cryptoAmount !== null) {
            $flags |= (1 << 0);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->days);
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);
        $days = Deserializer::int32($__payload, $__offset);
        $cryptoCurrency = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $cryptoAmount = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;

        return new self(
            $currency,
            $amount,
            $days,
            $cryptoCurrency,
            $cryptoAmount,
            $message
        );
    }
}