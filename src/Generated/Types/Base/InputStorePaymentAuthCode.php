<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentAuthCode
 */
final class InputStorePaymentAuthCode extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x9bb2636d;
    
    public string $predicate = 'inputStorePaymentAuthCode';
    
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $currency
     * @param int $amount
     * @param true|null $restore
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?true $restore = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $restore = (($flags & (1 << 0)) !== 0) ? true : null;
        $phoneNumber = Deserializer::bytes($__payload, $__offset);
        $phoneCodeHash = Deserializer::bytes($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $phoneNumber,
            $phoneCodeHash,
            $currency,
            $amount,
            $restore
        );
    }
}