<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\JoinAsPeers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallJoinAs
 */
final class GetGroupCallJoinAsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xef7c213a;
    
    public string $predicate = 'phone.getGroupCallJoinAs';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallJoinAs';
    }
    
    public function getResponseClass(): string
    {
        return JoinAsPeers::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}