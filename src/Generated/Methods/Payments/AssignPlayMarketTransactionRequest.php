<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.assignPlayMarketTransaction
 */
final class AssignPlayMarketTransactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3757920467;
    
    public string $_ = 'payments.assignPlayMarketTransaction';
    
    public function getMethodName(): string
    {
        return 'payments.assignPlayMarketTransaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param array $receipt
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly array $receipt,
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= (new DataJSON(json_encode($this->receipt)))->serialize($serializer);
        $buffer .= $this->purpose->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}