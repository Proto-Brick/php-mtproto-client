<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueAdsAccountUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
 */
final class GetStarsRevenueAdsAccountUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd1d7efc5;
    
    public string $predicate = 'payments.getStarsRevenueAdsAccountUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsRevenueAdsAccountUrl';
    }
    
    public function getResponseClass(): string
    {
        return StarsRevenueAdsAccountUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}