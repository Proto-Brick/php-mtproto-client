<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionTodoAppendTasks
 */
final class MessageActionTodoAppendTasks extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xc7edbc83;
    
    public string $predicate = 'messageActionTodoAppendTasks';
    
    /**
     * @param list<TodoItem> $list_
     */
    public function __construct(
        public readonly array $list_
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->list_);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $list_ = Deserializer::vectorOfObjects($stream, [TodoItem::class, 'deserialize']);

        return new self(
            $list_
        );
    }
}