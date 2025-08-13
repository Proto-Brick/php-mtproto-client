<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsStatus;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsSubscriptions
 */
final class GetStarsSubscriptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x32512c5;
    
    public string $predicate = 'payments.getStarsSubscriptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsSubscriptions';
    }
    
    public function getResponseClass(): string
    {
        return StarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param true|null $missingBalance
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly ?true $missingBalance = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->missingBalance) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->offset);
        return $buffer;
    }
}