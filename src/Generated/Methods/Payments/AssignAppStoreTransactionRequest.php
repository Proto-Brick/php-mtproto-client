<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.assignAppStoreTransaction
 */
final class AssignAppStoreTransactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2163045501;
    
    public string $_ = 'payments.assignAppStoreTransaction';
    
    public function getMethodName(): string
    {
        return 'payments.assignAppStoreTransaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $receipt
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly string $receipt,
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->receipt);
        $buffer .= $this->purpose->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}