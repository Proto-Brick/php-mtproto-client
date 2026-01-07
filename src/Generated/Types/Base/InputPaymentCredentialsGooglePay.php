<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentialsGooglePay
 */
final class InputPaymentCredentialsGooglePay extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 0x8ac32801;
    
    public string $predicate = 'inputPaymentCredentialsGooglePay';
    
    /**
     * @param array $paymentToken
     */
    public function __construct(
        public readonly array $paymentToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->paymentToken);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $paymentToken = Deserializer::deserializeDataJSON($__payload, $__offset);

        return new self(
            $paymentToken
        );
    }
}