<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodePaymentRequired
 */
final class SentCodePaymentRequired extends AbstractSentCode
{
    public const CONSTRUCTOR_ID = 0xd7cef980;
    
    public string $predicate = 'auth.sentCodePaymentRequired';
    
    /**
     * @param string $storeProduct
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $storeProduct,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->storeProduct);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $storeProduct = Deserializer::bytes($__payload, $__offset);
        $phoneCodeHash = Deserializer::bytes($__payload, $__offset);

        return new self(
            $storeProduct,
            $phoneCodeHash
        );
    }
}