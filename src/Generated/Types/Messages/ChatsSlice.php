<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $count = Deserializer::int32($stream);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);

        return new self(
            $count,
            $chats
        );
    }
}