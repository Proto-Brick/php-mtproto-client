<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.refundStarsCharge
 */
final class RefundStarsChargeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x25ae8f4a;
    
    public string $_ = 'payments.refundStarsCharge';
    
    public function getMethodName(): string
    {
        return 'payments.refundStarsCharge';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $chargeId
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $chargeId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->bytes($this->chargeId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}