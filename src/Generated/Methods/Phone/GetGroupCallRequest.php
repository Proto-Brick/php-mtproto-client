<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupCall
 */
final class GetGroupCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x41845db;
    
    public string $predicate = 'phone.getGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return GroupCall::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}