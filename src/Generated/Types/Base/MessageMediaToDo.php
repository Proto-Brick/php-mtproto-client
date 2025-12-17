<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaToDo
 */
final class MessageMediaToDo extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x8a53b014;
    
    public string $predicate = 'messageMediaToDo';
    
    /**
     * @param TodoList $todo
     * @param list<TodoCompletion>|null $completions
     */
    public function __construct(
        public readonly TodoList $todo,
        public readonly ?array $completions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->completions !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->todo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->completions);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $todo = TodoList::deserialize($__payload, $__offset);
        $completions = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [TodoCompletion::class, 'deserialize']) : null;

        return new self(
            $todo,
            $completions
        );
    }
}