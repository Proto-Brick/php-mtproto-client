<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsRevenueStats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueStats
 */
final class GetStarsRevenueStatsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd91ffad6;
    
    public string $_ = 'payments.getStarsRevenueStats';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsRevenueStats';
    }
    
    public function getResponseClass(): string
    {
        return StarsRevenueStats::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool|null $dark
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?bool $dark = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}