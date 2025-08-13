<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getQuickReplyMessages
 */
final class GetQuickReplyMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x94a495c3;
    
    public string $predicate = 'messages.getQuickReplyMessages';
    
    public function getMethodName(): string
    {
        return 'messages.getQuickReplyMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param int $shortcutId
     * @param int $hash
     * @param list<int>|null $id
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly int $hash,
        public readonly ?array $id = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->id !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->shortcutId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->id);
        }
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}