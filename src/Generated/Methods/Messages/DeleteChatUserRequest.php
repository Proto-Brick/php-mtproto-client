<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteChatUser
 */
final class DeleteChatUserRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa2185cab;
    
    public string $predicate = 'messages.deleteChatUser';
    
    public function getMethodName(): string
    {
        return 'messages.deleteChatUser';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param true|null $revokeHistory
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly ?true $revokeHistory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revokeHistory) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}