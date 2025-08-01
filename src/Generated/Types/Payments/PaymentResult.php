<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentResult
 */
final class PaymentResult extends AbstractPaymentResult
{
    public const CONSTRUCTOR_ID = 1314881805;
    
    public string $_ = 'payments.paymentResult';
    
    /**
     * @param AbstractUpdates $updates
     */
    public function __construct(
        public readonly AbstractUpdates $updates
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $updates = AbstractUpdates::deserialize($deserializer, $stream);
            return new self(
            $updates
        );
    }
}