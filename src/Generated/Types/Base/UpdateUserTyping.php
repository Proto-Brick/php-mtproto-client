<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateUserTyping
 */
final class UpdateUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2a17bf5c;
    
    public string $predicate = 'updateUserTyping';
    
    /**
     * @param int $userId
     * @param AbstractSendMessageAction $action
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractSendMessageAction $action,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= $this->action->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $topMsgId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $action = AbstractSendMessageAction::deserialize($__payload, $__offset);

        return new self(
            $userId,
            $action,
            $topMsgId
        );
    }
}