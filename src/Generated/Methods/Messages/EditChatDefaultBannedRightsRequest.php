<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatBannedRights;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editChatDefaultBannedRights
 */
final class EditChatDefaultBannedRightsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa5866b41;
    
    public string $predicate = 'messages.editChatDefaultBannedRights';
    
    public function getMethodName(): string
    {
        return 'messages.editChatDefaultBannedRights';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param ChatBannedRights $bannedRights
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ChatBannedRights $bannedRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->bannedRights->serialize();
        return $buffer;
    }
}