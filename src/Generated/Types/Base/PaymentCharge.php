<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/paymentCharge
 */
final class PaymentCharge extends AbstractPaymentCharge
{
    public const CONSTRUCTOR_ID = 3926049406;
    
    public string $_ = 'paymentCharge';
    
    /**
     * @param string $id
     * @param string $providerChargeId
     */
    public function __construct(
        public readonly string $id,
        public readonly string $providerChargeId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->providerChargeId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $providerChargeId = $deserializer->bytes($stream);
            return new self(
            $id,
            $providerChargeId
        );
    }
}