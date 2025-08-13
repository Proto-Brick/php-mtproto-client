<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.assignPlayMarketTransaction
 */
final class AssignPlayMarketTransactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdffd50d3;
    
    public string $predicate = 'payments.assignPlayMarketTransaction';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->receipt);
        $buffer .= $this->purpose->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}