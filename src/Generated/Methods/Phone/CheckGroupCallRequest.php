<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.checkGroupCall
 */
final class CheckGroupCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb59cf977;
    
    public string $predicate = 'phone.checkGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.checkGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $sources
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $sources
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfInts($this->sources);
        return $buffer;
    }
}