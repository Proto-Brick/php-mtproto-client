<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteRevokedExportedChatInvites
 */
final class DeleteRevokedExportedChatInvitesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x56987bd5;
    
    public string $predicate = 'messages.deleteRevokedExportedChatInvites';
    
    public function getMethodName(): string
    {
        return 'messages.deleteRevokedExportedChatInvites';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $adminId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $adminId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->adminId->serialize();
        return $buffer;
    }
}