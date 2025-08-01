<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.canPurchasePremium
 */
final class CanPurchasePremiumRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2680266422;
    
    public string $_ = 'payments.canPurchasePremium';
    
    public function getMethodName(): string
    {
        return 'payments.canPurchasePremium';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}