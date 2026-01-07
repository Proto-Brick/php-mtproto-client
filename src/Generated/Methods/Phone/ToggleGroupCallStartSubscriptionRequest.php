<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallStartSubscription
 */
final class ToggleGroupCallStartSubscriptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x219c34e6;
    
    public string $predicate = 'phone.toggleGroupCallStartSubscription';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallStartSubscription';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param bool $subscribed
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly bool $subscribed
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= ($this->subscribed ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}