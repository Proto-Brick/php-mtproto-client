<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteExportedChatInvite
 */
final class DeleteExportedChatInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd464a42b;
    
    public string $predicate = 'messages.deleteExportedChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.deleteExportedChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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