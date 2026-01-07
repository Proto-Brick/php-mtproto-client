<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageEditData;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMessageEditData
 */
final class GetMessageEditDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfda68d36;
    
    public string $predicate = 'messages.getMessageEditData';
    
    public function getMethodName(): string
    {
        return 'messages.getMessageEditData';
    }
    
    public function getResponseClass(): string
    {
        return MessageEditData::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}