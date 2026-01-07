<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.changeStarsSubscription
 */
final class ChangeStarsSubscriptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc7770878;
    
    public string $predicate = 'payments.changeStarsSubscription';
    
    public function getMethodName(): string
    {
        return 'payments.changeStarsSubscription';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $subscriptionId
     * @param bool|null $canceled
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $subscriptionId,
        public readonly ?bool $canceled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canceled !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->subscriptionId);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->canceled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
}