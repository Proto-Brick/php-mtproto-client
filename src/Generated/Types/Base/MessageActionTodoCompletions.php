<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $completed = Deserializer::vectorOfInts($stream);
        $incompleted = Deserializer::vectorOfInts($stream);

        return new self(
            $completed,
            $incompleted
        );
    }
}