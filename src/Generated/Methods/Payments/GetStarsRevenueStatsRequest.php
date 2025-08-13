<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueStats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueStats
 */
final class GetStarsRevenueStatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd91ffad6;
    
    public string $predicate = 'payments.getStarsRevenueStats';
    
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
     * @param true|null $dark
     * @param true|null $ton
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $dark = null,
        public readonly ?true $ton = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) {
            $flags |= (1 << 0);
        }
        if ($this->ton) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}