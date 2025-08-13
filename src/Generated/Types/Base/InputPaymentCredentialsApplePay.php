<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentialsApplePay
 */
final class InputPaymentCredentialsApplePay extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 0xaa1c39f;
    
    public string $predicate = 'inputPaymentCredentialsApplePay';
    
    /**
     * @param array $paymentData
     */
    public function __construct(
        public readonly array $paymentData
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->paymentData);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $paymentData = Deserializer::deserializeDataJSON($stream);

        return new self(
            $paymentData
        );
    }
}