<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.chats
 */
final class Chats extends AbstractChats
{
    public const CONSTRUCTOR_ID = 0x64ff9fd5;
    
    public string $predicate = 'messages.chats';
    
    /**
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);

        return new self(
            $chats
        );
    }
}