<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateUserTyping
 */
final class UpdateUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xc01e857f;
    
    public string $predicate = 'updateUserTyping';
    
    /**
     * @param int $userId
     * @param AbstractSendMessageAction $action
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractSendMessageAction $action
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->action->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);
        $action = AbstractSendMessageAction::deserialize($__payload, $__offset);

        return new self(
            $userId,
            $action
        );
    }
}