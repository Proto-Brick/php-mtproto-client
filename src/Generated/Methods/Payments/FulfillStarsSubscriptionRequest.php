<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.fulfillStarsSubscription
 */
final class FulfillStarsSubscriptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcc5bebb3;
    
    public string $predicate = 'payments.fulfillStarsSubscription';
    
    public function getMethodName(): string
    {
        return 'payments.fulfillStarsSubscription';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $subscriptionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $subscriptionId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->subscriptionId);
        return $buffer;
    }
}