<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatInviteImporters;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getChatInviteImporters
 */
final class GetChatInviteImportersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdf04dd4e;
    
    public string $predicate = 'messages.getChatInviteImporters';
    
    public function getMethodName(): string
    {
        return 'messages.getChatInviteImporters';
    }
    
    public function getResponseClass(): string
    {
        return ChatInviteImporters::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetDate
     * @param AbstractInputUser $offsetUser
     * @param int $limit
     * @param true|null $requested
     * @param true|null $subscriptionExpired
     * @param string|null $link
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetDate,
        public readonly AbstractInputUser $offsetUser,
        public readonly int $limit,
        public readonly ?true $requested = null,
        public readonly ?true $subscriptionExpired = null,
        public readonly ?string $link = null,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requested) {
            $flags |= (1 << 0);
        }
        if ($this->subscriptionExpired) {
            $flags |= (1 << 3);
        }
        if ($this->link !== null) {
            $flags |= (1 << 1);
        }
        if ($this->q !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->link);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->q);
        }
        $buffer .= Serializer::int32($this->offsetDate);
        $buffer .= $this->offsetUser->serialize();
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}