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
    public const CONSTRUCTOR_ID = 0x4e5f810d;
    
    public string $predicate = 'payments.paymentResult';
    
    /**
     * @param AbstractUpdates $updates
     */
    public function __construct(
        public readonly AbstractUpdates $updates
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $updates = AbstractUpdates::deserialize($stream);

        return new self(
            $updates
        );
    }
}