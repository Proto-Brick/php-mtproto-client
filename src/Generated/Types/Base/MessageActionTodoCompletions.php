<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionTodoCompletions
 */
final class MessageActionTodoCompletions extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xcc7c5c89;
    
    public string $predicate = 'messageActionTodoCompletions';
    
    /**
     * @param list<int> $completed
     * @param list<int> $incompleted
     */
    public function __construct(
        public readonly array $completed,
        public readonly array $incompleted
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->completed);
        $buffer .= Serializer::vectorOfInts($this->incompleted);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $completed = Deserializer::vectorOfInts($__payload, $__offset);
        $incompleted = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $completed,
            $incompleted
        );
    }
}