<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\AbstractBroadcastRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getBroadcastRevenueWithdrawalUrl
 */
final class GetBroadcastRevenueWithdrawalUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2650077869;
    
    public string $_ = 'stats.getBroadcastRevenueWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'stats.getBroadcastRevenueWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBroadcastRevenueWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->password->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}