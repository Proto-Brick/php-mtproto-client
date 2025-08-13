<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaTodo
 */
final class InputMediaTodo extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x9fc55fde;
    
    public string $predicate = 'inputMediaTodo';
    
    /**
     * @param TodoList $todo
     */
    public function __construct(
        public readonly TodoList $todo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->todo->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $todo = TodoList::deserialize($stream);

        return new self(
            $todo
        );
    }
}