<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        $buffer .= Serializer::bytes(json_encode($this->paymentToken, JSON_FORCE_OBJECT));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $paymentToken = Deserializer::deserializeDataJSON($stream);

        return new self(
            $paymentToken
        );
    }
}