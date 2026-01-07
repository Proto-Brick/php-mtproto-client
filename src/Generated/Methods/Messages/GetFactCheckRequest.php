<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\FactCheck;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getFactCheck
 */
final class GetFactCheckRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb9cdc5ee;
    
    public string $predicate = 'messages.getFactCheck';
    
    public function getMethodName(): string
    {
        return 'messages.getFactCheck';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FactCheck::class . '>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->msgId);
        return $buffer;
    }
}