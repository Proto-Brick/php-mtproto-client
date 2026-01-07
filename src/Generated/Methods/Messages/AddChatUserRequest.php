<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.addChatUser
 */
final class AddChatUserRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcbc6d107;
    
    public string $predicate = 'messages.addChatUser';
    
    public function getMethodName(): string
    {
        return 'messages.addChatUser';
    }
    
    public function getResponseClass(): string
    {
        return InvitedUsers::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param int $fwdLimit
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly int $fwdLimit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->fwdLimit);
        return $buffer;
    }
}