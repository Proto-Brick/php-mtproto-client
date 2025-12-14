<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/todoList
 */
final class TodoList extends TlObject
{
    public const CONSTRUCTOR_ID = 0x49b92a26;
    
    public string $predicate = 'todoList';
    
    /**
     * @param TextWithEntities $title
     * @param list<TodoItem> $list_
     * @param true|null $othersCanAppend
     * @param true|null $othersCanComplete
     */
    public function __construct(
        public readonly TextWithEntities $title,
        public readonly array $list_,
        public readonly ?true $othersCanAppend = null,
        public readonly ?true $othersCanComplete = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->othersCanAppend) {
            $flags |= (1 << 0);
        }
        if ($this->othersCanComplete) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->title->serialize();
        $buffer .= Serializer::vectorOfObjects($this->list_);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $othersCanAppend = (($flags & (1 << 0)) !== 0) ? true : null;
        $othersCanComplete = (($flags & (1 << 1)) !== 0) ? true : null;
        $title = TextWithEntities::deserialize($stream);
        $list_ = Deserializer::vectorOfObjects($stream, [TodoItem::class, 'deserialize']);

        return new self(
            $title,
            $list_,
            $othersCanAppend,
            $othersCanComplete
        );
    }
}