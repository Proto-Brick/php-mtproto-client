<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.sendConferenceCallBroadcast
 */
final class SendConferenceCallBroadcastRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc6701900;
    
    public string $predicate = 'phone.sendConferenceCallBroadcast';
    
    public function getMethodName(): string
    {
        return 'phone.sendConferenceCallBroadcast';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param string $block
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly string $block
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::bytes($this->block);
        return $buffer;
    }
}