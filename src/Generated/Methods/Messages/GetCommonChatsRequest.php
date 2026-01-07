<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getCommonChats
 */
final class GetCommonChatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe40ca104;
    
    public string $predicate = 'messages.getCommonChats';
    
    public function getMethodName(): string
    {
        return 'messages.getCommonChats';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $maxId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $maxId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int64($this->maxId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}