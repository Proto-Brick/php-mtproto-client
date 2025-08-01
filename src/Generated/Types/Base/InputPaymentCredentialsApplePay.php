<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentialsApplePay
 */
final class InputPaymentCredentialsApplePay extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 178373535;
    
    public string $_ = 'inputPaymentCredentialsApplePay';
    
    /**
     * @param array $paymentData
     */
    public function __construct(
        public readonly array $paymentData
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= (new DataJSON(json_encode($this->paymentData)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $paymentData = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $paymentData
        );
    }
}