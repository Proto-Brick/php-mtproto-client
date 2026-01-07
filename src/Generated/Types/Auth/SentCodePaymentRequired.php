<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodePaymentRequired
 */
final class SentCodePaymentRequired extends AbstractSentCode
{
    public const CONSTRUCTOR_ID = 0xe0955a3c;
    
    public string $predicate = 'auth.sentCodePaymentRequired';
    
    /**
     * @param string $storeProduct
     * @param string $phoneCodeHash
     * @param string $supportEmailAddress
     * @param string $supportEmailSubject
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly string $storeProduct,
        public readonly string $phoneCodeHash,
        public readonly string $supportEmailAddress,
        public readonly string $supportEmailSubject,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->storeProduct);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->supportEmailAddress);
        $buffer .= Serializer::bytes($this->supportEmailSubject);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $storeProduct = Deserializer::bytes($__payload, $__offset);
        $phoneCodeHash = Deserializer::bytes($__payload, $__offset);
        $supportEmailAddress = Deserializer::bytes($__payload, $__offset);
        $supportEmailSubject = Deserializer::bytes($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $storeProduct,
            $phoneCodeHash,
            $supportEmailAddress,
            $supportEmailSubject,
            $currency,
            $amount
        );
    }
}