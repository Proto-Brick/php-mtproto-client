<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatInviteAlready
 */
final class ChatInviteAlready extends AbstractChatInvite
{
    public const CONSTRUCTOR_ID = 0x5a686d7c;
    
    public string $_ = 'chatInviteAlready';
    
    /**
     * @param AbstractChat $chat
     */
    public function __construct(
        public readonly AbstractChat $chat
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $chat = AbstractChat::deserialize($stream);
        return new self(
            $chat
        );
    }
}