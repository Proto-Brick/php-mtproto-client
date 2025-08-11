<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getBroadcastRevenueWithdrawalUrl
 */
final class GetBroadcastRevenueWithdrawalUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9df4faad;
    
    public string $_ = 'stats.getBroadcastRevenueWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'stats.getBroadcastRevenueWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return BroadcastRevenueWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->password->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}