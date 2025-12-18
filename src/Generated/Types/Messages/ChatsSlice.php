<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.chatsSlice
 */
final class ChatsSlice extends AbstractChats
{
    public const CONSTRUCTOR_ID = 0x9cd81144;
    
    public string $predicate = 'messages.chatsSlice';
    
    /**
     * @param int $count
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly int $count,
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $count = Deserializer::int32($__payload, $__offset);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);

        return new self(
            $count,
            $chats
        );
    }
}