<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatUserTyping
 */
final class UpdateChatUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x83487af0;
    
    public string $predicate = 'updateChatUserTyping';
    
    /**
     * @param int $chatId
     * @param AbstractPeer $fromId
     * @param AbstractSendMessageAction $action
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractPeer $fromId,
        public readonly AbstractSendMessageAction $action
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->fromId->serialize();
        $buffer .= $this->action->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $chatId = Deserializer::int64($__payload, $__offset);
        $fromId = AbstractPeer::deserialize($__payload, $__offset);
        $action = AbstractSendMessageAction::deserialize($__payload, $__offset);

        return new self(
            $chatId,
            $fromId,
            $action
        );
    }
}