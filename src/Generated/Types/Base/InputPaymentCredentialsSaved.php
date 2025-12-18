<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentialsSaved
 */
final class InputPaymentCredentialsSaved extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 0xc10eb2cf;
    
    public string $predicate = 'inputPaymentCredentialsSaved';
    
    /**
     * @param string $id
     * @param string $tmpPassword
     */
    public function __construct(
        public readonly string $id,
        public readonly string $tmpPassword
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->tmpPassword);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::bytes($__payload, $__offset);
        $tmpPassword = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $tmpPassword
        );
    }
}