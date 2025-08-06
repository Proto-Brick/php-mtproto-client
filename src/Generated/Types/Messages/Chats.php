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
    
    public string $_ = 'messages.chats';
    
    /**
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly array $chats
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        return new self(
            $chats
        );
    }
}