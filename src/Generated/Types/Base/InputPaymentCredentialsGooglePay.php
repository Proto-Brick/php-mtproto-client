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
    public const CONSTRUCTOR_ID = 2328045569;
    
    public string $_ = 'inputPaymentCredentialsGooglePay';
    
    /**
     * @param array $paymentToken
     */
    public function __construct(
        public readonly array $paymentToken
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= (new DataJSON(json_encode($this->paymentToken)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $paymentToken = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $paymentToken
        );
    }
}