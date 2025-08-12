<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);

        return new self(
            $chats
        );
    }
}