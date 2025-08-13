<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatOnlines;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getOnlines
 */
final class GetOnlinesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6e2be050;
    
    public string $predicate = 'messages.getOnlines';
    
    public function getMethodName(): string
    {
        return 'messages.getOnlines';
    }
    
    public function getResponseClass(): string
    {
        return ChatOnlines::class;
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