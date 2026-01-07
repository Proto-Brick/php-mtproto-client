<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatAdminsWithInvites;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAdminsWithInvites
 */
final class GetAdminsWithInvitesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3920e6ef;
    
    public string $predicate = 'messages.getAdminsWithInvites';
    
    public function getMethodName(): string
    {
        return 'messages.getAdminsWithInvites';
    }
    
    public function getResponseClass(): string
    {
        return ChatAdminsWithInvites::class;
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