<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractExportedChatInvite;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getExportedChatInvite
 */
final class GetExportedChatInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x73746f5c;
    
    public string $predicate = 'messages.getExportedChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.getExportedChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedChatInvite::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->link);
        return $buffer;
    }
}