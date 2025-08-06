<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBroadcastRevenueTransactions
 */
final class UpdateBroadcastRevenueTransactions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xdfd961f5;
    
    public string $_ = 'updateBroadcastRevenueTransactions';
    
    /**
     * @param AbstractPeer $peer
     * @param BroadcastRevenueBalances $balances
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly BroadcastRevenueBalances $balances
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->balances->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $balances = BroadcastRevenueBalances::deserialize($deserializer, $stream);
        return new self(
            $peer,
            $balances
        );
    }
}