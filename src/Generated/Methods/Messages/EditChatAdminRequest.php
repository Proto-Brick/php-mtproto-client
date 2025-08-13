<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editChatAdmin
 */
final class EditChatAdminRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa85bd1c2;
    
    public string $predicate = 'messages.editChatAdmin';
    
    public function getMethodName(): string
    {
        return 'messages.editChatAdmin';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param bool $isAdmin
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly bool $isAdmin
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->userId->serialize();
        $buffer .= ($this->isAdmin ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}