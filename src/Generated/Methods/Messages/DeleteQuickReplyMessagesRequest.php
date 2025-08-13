<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteQuickReplyMessages
 */
final class DeleteQuickReplyMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe105e910;
    
    public string $predicate = 'messages.deleteQuickReplyMessages';
    
    public function getMethodName(): string
    {
        return 'messages.deleteQuickReplyMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $shortcutId
     * @param list<int> $id
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}