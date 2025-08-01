<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarsRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
 */
final class GetStarsRevenueWithdrawalUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 331081907;
    
    public string $_ = 'payments.getStarsRevenueWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsRevenueWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsRevenueWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $stars
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $stars,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->stars);
        $buffer .= $this->password->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}