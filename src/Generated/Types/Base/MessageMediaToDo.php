<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->completions !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->todo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->completions);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $todo = TodoList::deserialize($stream);
        $completions = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [TodoCompletion::class, 'deserialize']) : null;

        return new self(
            $todo,
            $completions
        );
    }
}