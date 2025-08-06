<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastRevenueTransactions;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getBroadcastRevenueTransactions
 */
final class GetBroadcastRevenueTransactionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x70990b6d;
    
    public string $_ = 'stats.getBroadcastRevenueTransactions';
    
    public function getMethodName(): string
    {
        return 'stats.getBroadcastRevenueTransactions';
    }
    
    public function getResponseClass(): string
    {
        return BroadcastRevenueTransactions::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}