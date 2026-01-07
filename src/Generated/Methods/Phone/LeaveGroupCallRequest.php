<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.leaveGroupCall
 */
final class LeaveGroupCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x500377f9;
    
    public string $predicate = 'phone.leaveGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.leaveGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $source
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $source
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->source);
        return $buffer;
    }
}